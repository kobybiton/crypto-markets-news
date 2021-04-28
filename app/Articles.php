<?php

namespace App;

use App\General;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Validator;
use Image;
use Illuminate\Support\Facades\DB;

class Articles extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'category_name', 'category_url', 'url', 'image', 'title', 'description', 'sub_title', 'date', 'author', 'editordata'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function comments(){
        return $this->hasMany('App\Comments');
    }

    public static function validator($request){

        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'sub_title' => 'required',
            'author' => 'required',
            'editordata' => 'required'
        ]);

        if($validator->passes()){
           Articles::saveEditorData($request);
        } else {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                echo $message;
            }
        }
    }

    public static function saveEditorData($request){

        $detail = $request->editordata;
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING);
        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){

            $data = $img->getattribute('src');
            $data = base64_decode($data);
            $image_name = $img->getattribute('data-filename');

/*            if(!file_exists(public_path('upload/'. $image_name))){
                $path = public_path() .'/upload/'. $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', asset('upload/'. $image_name));
            }*/
        }

        $detail = $dom->savehtml();
        $id = $request->id;
        $input = $request->all();
        $category = json_decode($input['category']);
        $input['url'] = General::friendly_url($input['url']);
        $category_url = General::friendly_url($category[0]->name);
        $filteredInput = array_filter($input);
        unset($filteredInput['_token']);

        if(!empty($request->file())){

            $images = $request->file();
            unset($filteredInput['files']);

            foreach($images as $key => $image){

                $image_name = General::friendly_url($image->getClientOriginalName());

                if(!file_exists(public_path('upload/article'. $image_name))){

                    $image_props = [
                        [
                            'width' => 150,
                            'height' => 115,
                            'path' => 'articles'
                        ],
                        [
                            'width' => 337,
                            'height' => 258,
                            'path' => 'latest_news'
                        ],
                        [
                            'width' => 426,
                            'height' => 327,
                            'path' => 'top_news'
                        ],
                        [
                            'width' => 536,
                            'height' => 411,
                            'path' => 'hottest_news'
                        ],
                    ];

                    foreach($image_props as $image_prop) {
                        $destination_path = public_path('upload/' . $image_prop['path']);
                        $img = Image::make($image->path());
                        $img->resize($image_prop['width'], $image_prop['height'], function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destination_path .'/'. $image_name );
                    }

                    $images[$key]->move(public_path('upload/article'), $image_name);
                }
            }

            if(isset($images['image']) && !empty($images['image'])){
                $filteredInput['image'] = General::friendly_url($images['image']->getClientOriginalName());
            }
            $image_name = General::friendly_url($images['image']->getClientOriginalName());
        }

        // check if insert or update
        if(!isset($id) && empty($id)){

            $insert_data = Articles::create( [
                'category_id' => $category[0]->id,
                'category_name' => $category[0]->name,
                'category_url' => $category_url,
                'url' => $input['url'],
                'image' => $image_name,
                'title' => $input['title'],
                'sub_title' => $input['sub_title'],
                'description' => $input['description'],
                'date' => $input['date'] ? $input['date']: DB::raw('CURRENT_TIMESTAMP'),
                'author' => $input['author'],
                'editordata' => $detail,
                'views' => 0
            ]);

            $status = $insert_data->save();

            if($status !== 0){
                echo 'success';
            }
            else{
                echo 'Unfortunately the process failed, please try again later...';
            }

        }else{

            unset($filteredInput['category']);
            $filteredInput['category_id'] = $category[0]->id;
            $filteredInput['category_name'] = $category[0]->name;
            $updated_data = Articles::where('id', $id)
                                    ->update($filteredInput);

            if($updated_data !== 0){
                echo 'success';
            }
            else{
                echo 'error';
            }
        }
    }
}

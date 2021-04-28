<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
use DB;

class Banners extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location', 'name', 'src', 'link', 'sort'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static function Validator($request){

        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required'
        ]);

        if ($validator->passes()){

            $id = $request->id;
            $input = $request->all();

            if(!empty($request->file())){

                $images = $request->file();

                foreach($images as $key => $image){

                    $image_name = General::friendly_url($image->getClientOriginalName());

                    if(!file_exists(public_path('upload/banners'. $image_name))){
                        $images[$key]->move(public_path('upload/banners'), $image_name);
                    }
                }
            } else {
                $image_name = DB::table('banners')->select('image')->where('id','=', $id)->get();
                $image_name = General::friendly_url($image_name[0]->image);
            }

            // check if insert or update
            if(isset($id) && !empty($id)){

                $updated_data = Banners::where('id', $id)
                  ->update([
                    'location' => $input['location'],
                    'image' => $image_name,
                    'link' => $input['link'],
                    'sort' => 0,
                ]);

                if($updated_data !== 0){
                    echo 'success';
                }
                else{
                    echo 'unfortunately the process failed, please try again later...';
                }
            }
        }
        else{
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                echo $message;
            }
        }
    }
}

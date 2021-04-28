<?php

namespace App;

use App\General;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function articles(){
        return $this->hasMany('App\Articles');
    }

    public static function Validator($request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()){

            $url = General::friendly_url($request->name);
            $name = ucfirst($request->name);
            $id = $request->id;

            if(!isset($id) && empty($id)) {

                $insert_data = Category::create([
                    'name' => $name,
                     'url'  => $url
                    ]);

                if ( $insert_data !== 0 ) {
                    echo 'success';
                } else {
                    echo 'unfortunately the process failed, please try again later...';
                }
            } else {
                $updated_data = Category::where('id', $id)->update([
                     'name' => $name,
                     'url'  => $url
                ]);

                if($updated_data !== 0){
                    echo 'success';
                }
                else{
                    echo 'error';
                }
            }

        } else {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                echo $message;
            }
        }
    }
}

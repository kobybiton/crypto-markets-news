<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Tags extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static function Validator($request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()){

            $url = General::friendly_url($request->name);
            $id = $request->id;

            if(!isset($id) && empty($id)) {

                $insert_data = Tags::create( $request->all() );

                if ( $insert_data !== 0 ) {
                    echo 'success';
                } else {
                    echo 'unfortunately the process failed, please try again later...';
                }
            } else {
                $updated_data = Tags::where('id', $id)->update([ 'name' => $request->name, ]);

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

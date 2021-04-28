<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class DeliveryMail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
    ];

    public static function Validator($request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->passes()){

            $insert_data = DeliveryMail::create($request->all());

            if ($insert_data !== 0) {
                echo json_encode(['status' => 'success', 'message' => 'Thank you for subscribing!']);
            } else {
                echo 'unfortunately the process failed, please try again later...';
            }

        } else {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                echo $message;
            }
        }
    }
}

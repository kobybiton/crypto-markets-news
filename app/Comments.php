<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Comments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id', 'name', 'email', 'message', 'status', 'status_action'
    ];

    public static function Validator($request){

        $validator = Validator::make($request->all(), [
            'article_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'status' => 'required',
            'status_action' => 'required',
        ]);

        if ($validator->passes()){

            $insert_data = Comments::create($request->all());
            $last_comment = Comments::where('id', '=', $insert_data->id)
                                    ->where('status', '=', 1)
                                    ->get();
            $all_comments_count = count(Comments::where('article_id', '=', $insert_data->article_id)->get());

            if ($insert_data !== 0) {
                echo json_encode(['status' => 'success', 'data' => $last_comment, 'all_comments_count' => $all_comments_count]);
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

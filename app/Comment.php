<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    protected $fillable = ['commenter','email','comment'];

    public static $rules = [
        'commenter' =>'required',
        'comment' => 'required',
    ];

    public static $messages = [
        'commenter.required' => 'タイトルを正しく入力してください。',
        'comment.required' => '本文を正しく入力してください。',
    ];


    public function post(){
        return $this->belongsTo('Post','cat_id  ');
    }

    public function getApprovedAttribute($approved){
        return (intval($approved) == 1) ? 'yes' : 'no';
    }

    public function setApprovedAttribute($approved){
        $this->attributes['approved'] = ($approved === 'yes') ? 1 : 0;

    }
}

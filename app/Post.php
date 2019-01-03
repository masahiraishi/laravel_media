<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable =['title','content'];

    public static $rules = [
      'title' =>'required',
      'content' =>'required',
      'cat_id' =>'required',
    ];
    public static $messages = [
      'title.required'=>'タイトルを正しく入力してください',
        'content.required'=>'本文を正しく入力してください',
        'cat_id.required'=>'カテゴリを洗濯してください'
    ];

    public function comments(){
//        1記事に対してコメントは複数
        return $this->hasMany('App\Comment','post_id');
    }

    public function user(){

        return $this->belongsTo('User');
    }

    public function Category(){
        // 投稿は1つのカテゴリーに属する
        return $this->belongsTo('App\Category','cat_id');
    }
}

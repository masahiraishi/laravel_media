<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable =['title','content'];

    public function comments(){
//        1記事に対してコメントは複数
        return $this->hasMany('Comment','post_id');
    }

    public function user(){

        return $this->belongsTo('User');
    }

    public function Category(){
        // 投稿は1つのカテゴリーに属する
        return $this->belongsTo('App\Category','cat_id');
    }
}

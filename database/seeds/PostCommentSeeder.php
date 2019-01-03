<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use App\Category;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content ='この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

        $commentdammy = 'コメントダミーです。ダミーコメントだよ。';

        for ($i = 1 ; $i<=10;$i++){
            $post = new Post;
            $post->author_id = mt_rand(1,2);
            $post->cat_id  = mt_rand(1,3);
            $post->title = "$i 番目の投稿";
            $post->content = $content;
//            投稿数の設定
            $maxComments = mt_rand(3,15);
            $post->comment_count = $maxComments;
            $post->save();

//            comment差し込み

            for ($j=0; $j<= $maxComments; $j++)
            {
                $comment = new Comment;
                $comment->commenter = '名無しさん';
                $comment->comment = $commentdammy;
                $comment->post_id = $i;
                $comment->email = 'xyz@gmail.com';
                $comment->approved = 1;

//              モデル(post.php)のCommentメソッドを読み込みpost_idに保存
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }

//        カテゴリを追加する
        $cat1 = new Category;
        $cat1->name = 'IT';
        $cat1->save();

        $cat2 = new Category;
        $cat2->name = "政治・経済";
        $cat2->save();

        $cat3 = new Category;
        $cat3->name = 'エンタメ';
        $cat3->save();

    }
}






























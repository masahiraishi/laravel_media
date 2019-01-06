<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
//    画像一覧表示
    public function index()
    {
        $photo = Photo::orderBy('created_at','desc')->paginate(5);
        return view('photos.create',['photo'=>$photo]);
    }
//    画像登録フォームへ
    public function create()
    {
        $photos = Photo::orderBy('created_at','desc')->paginate(5);
        return view('photos.create',['photos'=>$photos]);
    }
// 画像新規登録
    public function store(Request $request)
    {
        $params = $request->validate([
            'image' => 'required|file|image|max:4000',
        ]);

        $file = $params['image'];
        
        $image = \Image::make(file_get_contents($file->getRealPath()));
        $image
            ->save(public_path().'/images/'.$file->hashName());
//            ->resize(300, 300)
//            ->save(public_path().'/images/300-300-'.$file->hashName())
//            ->resize(500, 500)
//            ->save(public_path().'/images/500-500-'.$file->hashName());
//        echo $file->hashName(); ファイル名
        $photo = new Photo;
        $photo->path = '/images/'.$file->hashName();
        $photo->save();

        return redirect('create/');
    }
}

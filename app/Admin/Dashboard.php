<?php

namespace App\Admin;
use App\Post;

use Enomotodev\LaractiveAdmin\Http\Controllers\Controller;

class Dashboard extends Controller
{
    /**
     * @var array
     */
    public static $actions = [
        ['method' => 'get', 'uri' => '/', 'action' => 'index'],
    ];

    /**
     * @return string
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','asc')
            ->paginate(5);


        return view('admin.dashboard',['posts'=>$posts]);
    }
}

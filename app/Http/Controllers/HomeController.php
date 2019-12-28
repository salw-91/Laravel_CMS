<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user       = Auth::user();
        $users      = User::all();
        $posts      = Post::all();
        $categories = Category::all();
        $inbox      = Post::where('to', $user->id)->get();
        $send       = Post::where('from', $user->id)->get();
        $count      = Post::all()->where('to', Auth::user()->id);
        
        return view('home' , compact ('user','users', 'posts', 'categories', 'inbox', 'send', 'count'));
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Tag;
use App\Category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user           = Auth::user();
        $users           = User::all();
        if ($users->count() <= 1){
            return redirect()->route('home')->withErrors(['There is only one account, you can not make Post.', 'The Message']);
        }
        $to          = User::all()->where('id' ,'!==', Auth::user()->id);
        $categories     = Category::all();
        if ($categories->count() == 0) {
            return redirect()->route('Categories');
        }
        $posts          = Post::all();
        $inbox          = Post::where('to', $user->id)->get();
        $send           = Post::where('from', $user->id)->get();
        $receivedName   = User::all()->where( $send , '==' , Auth::user()->id );
        $tags           = Tag::all();
        if ($tags->count() == 0) {
            return redirect()->route('Tags') ;
        }

        return view('post.index' , compact('user','users' , 'to', 'categories', 'posts', 'inbox', 'send', 'receivedName', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories     = Category::all();
        $users          = User::all();
        return view('post.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= request()->validate([
            'title'         => 'required',
            'Message'       => 'required',
            'category_id'   => 'required',
            'to'            => 'required',
//            'tags'          => ['required' , 'Nullable'],
        ]);

        $data=Post::create([
            'title'         => $request->title,
            'content'       => $request->Message,
            'category_id'   => $request->category_id,
            'from'          => Auth::user()->id,
            'to'            => $request->to,
            ]);

        $data->tags()->sync($request->tags);

        return redirect()->route('Posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post   = Post::find($id);
        $users  = User::all();
        $categories = Category::all();

        return view('post.show' , compact('post', 'categories', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category   = Category::find($id);
        $categories = Category::all()->where('id' ,'!==' , $category );
        $post       = Post::find($id);
        $tags       = Tag::all();
        $tag        = Tag::find($id);
        $users      = User::all();
        $user       = User::find($id);

        return view('post.edit')->with(['categories' => $categories ,'category' =>$category , 'post'=> $post , 'tags'=> $tags  , 'tag'=> $tag , 'users' => $users, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title        = $request->input('title');
        $post->content      = $request->input('content');
        $post->category_id  = $request->input('category_id');
        $post->from         = $request->input('from');
        $post->to           = $request->input('to');
        $post->tags         = $request->input('tags');
        $post->save();
        return redirect()->route('Posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}

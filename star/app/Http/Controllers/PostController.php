<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return Inertia::render('posts/index', ['posts' => $posts]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate( ['title'=>'required', 
        //                     'content' => 'required|min:2']);
        
        $this->validate($request, [
            'image'=>'required',
            'title'=>'required', 
                            'content' => 'required']); 

        $fileName = null;

        if($request->hasFile('image')) {
            // $fileName = time().'_'.
            $fileName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')
                ->storeAs('public/images', $fileName); 

        }

        $input = array_merge($request->all(),
            ["user_id"=>Auth::user()->id]);

        

        if($fileName) {
            $input = array_merge($input, ['image'=>$fileName]);
        }


        Post::create($input);

        return redirect()->route('posts.index')->with('success', 1);           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $posts = Post::find($id);

        return Inertia::render('posts/edit', [
            'posts'=>$posts
        ]);
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
        $this->validate($request, [
                            // 'image'=>'required',
                            'title'=>'required', 
                            'content' => 'required|min:2']);

        $posts = Post::find($id);

        $posts->title = $request->title;             

        $posts->content = $request->content;
       
        
        $posts->save();

        return redirect()->route('posts.index', ['posts'=>$posts]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);


        if($posts->image) {
            Storage::delete('public/images/'.$posts->image);
        }
        $posts->delete();

        return redirect()->route('posts.index');
    }

}

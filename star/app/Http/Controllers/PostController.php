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
            'title'=>'required', 
                            'content' => 'required|min:2']); 

        $fileName = null;

        if($request->hasFile('image')) {
            $fileName = time().'_'.
                $request->file('image')->getClientOriginalName();
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

        // $this->authorize('update', $posts);

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
        $this->validate($request, ['title'=>'required', 
                            'content' => 'required|min:2']);

        $posts = Post::find($id);

        $posts->title = $request->title;             

        $posts->content = $request->content;
       
        if($request->image){

            if($posts->image){
                Storage::delete('public/images/'.$posts->image);
            }
            $fileName = time().'_'.
                $request->file('image')->getClientOriginalName();
            $posts->image = $fileName;
            $request->image->storeAs('public/images', $fileName);
        }
        $posts->save();

        return redirect()->route('posts.index', ['posts'=>$posts->id]);
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

        // $this->authorize('delete', $posts);

        if($posts->image) {
            Storage::delete('public/images/'.$posts->image);
        }

        $posts->delete();

        return redirect()->route('posts.index');
    }

    // public function deleteImage($id) {
    //     $posts = Post::find($id);
    //     Storage::delete('public/images/'.$posts->image);
    //     $posts->image = null;
    //     $posts->save();

    //     return redirect()->route('posts.edit', ['post'=>$posts->id]);
    // }
}

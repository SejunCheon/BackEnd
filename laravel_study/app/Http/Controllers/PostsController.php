<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            1. 게시글 리스트를 DB에서 읽어와야지
            2. 게시글 목록을 만들어주는 blade에 읽어온 데이터를 전달하고 실행 
        */
        $posts = Post::all();
        // dd($posts);
        return view('bbs.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title'=>'required', 
                            'content' => 'required|min:3']); // 정당성검사 통과하지 못하면 밑에 코드 실행 X
        // dd($request->all());
        $input = array_merge($request->all(),
                    ["user_id"=>Auth::user()->id]);
        // dd($input);

        /*
            $request -> all() : ['title' => 'abc', "content" => "123"]
            ["user_id"=>Auth::user()->id] => ["user_id" => 1]
            array_merge(['title' => 'abc', "content" => "123"],
                                    ["user_id" => 1]);
        */
        /*
            $input의 내용은 [
                "title" => "abc", "content" => "123", "user_id" => 1]
            ]
        */
        Post::create($input);

        // return view(('bbs.index'), ['posts'=>Post::all()]);
        return redirect()->route('posts.index');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

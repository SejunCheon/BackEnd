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
        // select * from posts order by created _at desc
        // $posts = Post::orderBy('created_at', 'desc')->get();

        // $posts = Post::latest()->get();
        // $posts = Post::oldest()->get();
        
        $posts = Post::latest()->paginate(10);

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
                            'content' => 'required|min:2']); // 정당성검사 통과하지 못하면 밑에 코드 실행 X

        $fileName = null;
        if($request->hasFile('image')) {
            // dd($request->file('image'));
            $fileName = time().'_'.
                $request->file('image')->getClientOriginalName();
            $path = $request->file('image')
                    ->storeAs('public/images', $fileName); // 지정한 경로로 파일저장
            // dd($path);
        }

        // dd($request->all());
        $input = array_merge($request->all(),
                    ["user_id"=>Auth::user()->id]);
        // 이미지가 있으면.. $input에 image 항목 추가
        if($fileName) {
            // dd($path.":".strrpos($path, '6'));
            // $path = substr($path, strrpos($path, '/')+1); // 이미지파일 이름만 빼내기 strrpos는 대상문자열 뒤에서 검색
            // // dd($path);
            // $path = time().'_'.$path; // 현재시간을 이름에 추가해 unique한 파일이름을 만든다
            $input = array_merge($input, ['image'=>$fileName]);
            // dd($input);
        }
        /*
            $request -> all() : ['title' => 'abc', "content" => "123"]
                                    ["user_id"=>Auth::user()->id] => ["user_id" => 1]
            array_merge(['title' => 'abc', "content" => "123"], ["user_id" => 1]);
        */
        /*
            $input의 내용은 [
                "title" => "abc", "content" => "123", "user_id" => 1]
            ]
        */

        // mass assignment
        // Eloquent model의 white list 인 $fillable에 기술해야 한다. 
        Post::create($input);

        // $post = new Post();
        // $post->title = $input['title'];
        // $post->content = $input['content'];

        // ...
        // $post->save();

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
        $post = Post::find($id);
        return view('bbs.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $id에 해당하는 포스트를 수정할 수 있는
        // 페이지를 반환해주면 된다.

        $post = Post::find($id);


        return view('bbs.edit', ['post'=>$post]);
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

        $post = Post::find($id);
        
        // $post->title = $request->input('title');

        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        $post->update(['title'=>$request->title,
                             'content'=>$request->content]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // DI, Dependency Injection, 의존성 주입
        // dd($request);
        $post = Post::find($id)->delete();

        return redirect()->route('posts.index', ['post'=>$post]);
    }
}

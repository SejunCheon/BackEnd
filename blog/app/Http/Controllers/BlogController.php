<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
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
        $blogs = Blog::latest()->paginate(5);
        return view('bbs.index', ['blogs'=>$blogs]);
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required|min:2',
        ]);

        $fileName = null;
        if($request->hasFile('image')) {
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileName);
            // 파일 이름이 자동으로 생성되는 것을 원하지 않으면 storeAs경로, 파일 이름 및 디스크 이름을 인수로 받아들이는 메서드
        }   

        $input = array_merge($request->all(), ['user_id' => Auth::user()->id]);

        if($fileName) {
            $input =array_merge($input, ['image'=>$fileName]);
        }

        Blog::create($input);

        return  redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id에 해당하는 Blog를 데이터베이스에서 인출
        $blog = Blog::find($id);
        // 그 놈을 상세보기 뷰로 전달한다.
        return view('bbs.show', ['blog' => $blog]);
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
        $file = Blog::where('id', $id)->first();
        $file->delete();

        return redirect()->route('blogs.index');
    }
}

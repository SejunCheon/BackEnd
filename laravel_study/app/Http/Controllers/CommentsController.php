<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        /*
            select * from comments where post_id = ?
            order by created_at desc;
        */

        $comments = Comment::with('user')->where('post_id', $postId)->latest()->paginate(2);

        return $comments;
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
    public function store(Request $request, $postId )
    {
        /* 첫 번째 방법:
            Comment 객체를 생성하거,
            이 객체의 멤버변수를 설정하고
            save();
            두 번째 방법:
            Comment::create([]);
            */
            // validation check
            $request->validate(['comment'=>'required']);
            // $request->validate(['email'=>'required|email|unique:comments']);
            // $this->validate($request, ['comment'=>'required]);

            // create에 사용할 수 있는 칼럼들은
            // Eloquent 모델 클래스에
            //
            $comment = Comment::create([
                'comment'=> $request->input('comment'),
                'user_id' => auth()->user()->id,
                'post_id'=>$postId,
           ]);

           return $comment; // 위 create에 의해 삽인된 레드코에 대응된 Eloquent
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function update(Request $request, $commentId)
    {
        // validation check
        $request->validate(['comment'=>'required']);
        // update할 레코를 먼저 찾고, 그 다음 update
        // selete * from comments where id = ?
        $comment = Comment::find($commentId);
        // update comments set comment=?, updated_at=now where id = ?
        $comment->update(['comment'=> $request->input('comment')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        /*
            comments 테이블에서 id가 $commentId인 레코드를 삭제
            1. RAW query
            2. DB query Bullfes
            3. Eloquent
            */
            // select * from comments where id = ?//
            $comment = Comment::find($comment);

            // delete from comments where id = >
            $comment->delete();

            return $comment;
    }
}

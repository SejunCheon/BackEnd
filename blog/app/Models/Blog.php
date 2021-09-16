<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
    ];

    public function writer() {
        /* User <-> Post 의 relationship */
        // 1 : N
        // User는 hasMany posts
        // Post는 belongs to a User
        return $this->belongsTo(User::class, 'user_id');
        // 유저테이블의 foreignkey로 연결되어있다
        /* user_id면 두번째 인수를 생략가능한데 id이름이 다를경우 따로 지정을 해주어야한다
            select 
            from users u, posts p
            inner join on u.id = p.writer_id
        */
    }
}

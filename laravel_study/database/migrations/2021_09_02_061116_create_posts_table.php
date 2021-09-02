<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable(); // null이 허용되는..
            // $table->unsignedBigInteger('user_id'); // foreignId의 약칭
            // $table->timestamps('created_at');
            
            // $table->foreignId('user_id')
            //         ->constrained() // 
            //         ->onUpdate('cascade') 
            //         // cascade = 개체를 변경/삭제할 때 다른 개체가 변경/삭제할 개체를 참조하고 있을 경우 함께 변경/삭제됩니다
            //         ->onDelete('cascade');

            // not find Driver 오류는 php.ini파일에서 extension을 찾고 앞부분에 세미콜론을 제거한다 제거한다는 건 그걸 사용한다는 의미이다

            $table->foreignId('user_id')->references('id')
                    ->on('users')->onDelete('cascade')
                    ->onUpdate('cascade');
                    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

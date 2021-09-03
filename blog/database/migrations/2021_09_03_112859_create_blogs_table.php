<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable(); // null이 허용되는..

            // $table->unsignedBigInteger('user_id'); // foreignId의 약칭
            // $table->timestamp('created_at');

            // $table->foreign('user_id')
            //         ->constrained()
            //         ->onUpdate('cascade')
            //         ->onDelete('cascade');

            //         // cascade = 개체를 변경/삭제할 때 다른 개체가 변경/삭제할 개체를 참조하고 있을 경우 함께 변경/삭제됩니다

            // $table->foreign('user_id')->references('id')->on('user')

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
        Schema::dropIfExists('blogs');
    }
}

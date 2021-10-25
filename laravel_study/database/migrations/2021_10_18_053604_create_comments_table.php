<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string("comment");
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            // $table->text('comment');
            $table->timestamps();
            /*
                create table comments
                    id biginteger primary key,
                    comment varchar(255)
                    user_id biginteger 
                            references id on users on delete cascade,
                    post_id biginteger 
                            references id on users on delete cascade,
                            created_at datetime,
                            updated_at datetime,
                            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

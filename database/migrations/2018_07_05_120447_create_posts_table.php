<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('restaurant');
            $table->integer('cost');
            $table->string('friends');
            $table->date('went_at');
            $table->date('end_at');
            $table->string('comments')->nullable();
            $table->integer('favo')->nullable();
            $table->string('pic_url')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
        
        
    }

    
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

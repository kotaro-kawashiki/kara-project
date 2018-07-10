<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostsTable extends Migration
{
    
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->dropColumn('friends');
        });
    }

    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
        });
    }
}

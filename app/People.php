<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
     protected $fillable = ['people_name',];
     
     public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'restaurant','cost','went_at','comments','favo','pic_url',];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function people()
    {
        return $this->hasMany(People::class);
    }
}

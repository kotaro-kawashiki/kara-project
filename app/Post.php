<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'restaurant','cost','friends','went_at','end_at','comments','favo','pic_url','category'];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function people()
    {
        return $this->hasMany(People::class);
    }
}

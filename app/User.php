<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','userid',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function favos()
    {
        return $this->belongsToMany(Post::class, 'user_favo', 'user_id', 'favo_id');
    }

    public function favo($postsId)
    {
    // confirm if already following
    $exist = $this->is_favoriting($postsId);
   
    if ($exist) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->favos()->attach($postsId);
        return true;
    }
    }
    
    public function unfavo($postsId)
    {
    // confirming if already following
    $exist = $this->is_favoriting($postsId);

    if ($exist) {
        // stop following if following
        $this->favos()->detach($postsId);
        return true;
    } else {
        // do nothing if not following
        return false;
    }
    }

public function is_favoriting($postsId) {
    return $this->favos()->where('favo_id', $postsId)->exists();
    }
    
}

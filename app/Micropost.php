<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
  //お気に入り機能中間テーブル  
    public function favoriters()
    {
        return $this->belongsToMany(User::class, 'user_micropost', 'micropost_id', 'user_id')->withTimestamps();
    }
    
}

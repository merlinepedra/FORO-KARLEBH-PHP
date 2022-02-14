<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function likes() {
    return $this->morphMany(Like::class);
  }

  public function post() {
    return $this->belongsTo(Post::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function replies()
  {
    return $this->hasMany(Comment::class, 'parent_id');
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }
}

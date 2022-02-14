<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function following()
  {
    return $this->belongsToMany(Profile::class);
  }

  public function profile()
  {
    return $this->hasOne(Profile::class);
  }

  public function posts() {
    return $this->hasMany(Post::class);
  }

  public function comments() {
    return $this->hasMany(Comment::class);
  }

  public function likes() {
    return $this->hasMany(Like::class);
  }

  public function categories() {
    return $this->hasMany(Category::class);
  }

  public function files() {
    return $this->hasMany(File::class);
  }
  
}

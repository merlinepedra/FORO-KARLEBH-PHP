<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $casts = [
    'category_id' => 'integer',
  ];

  protected $guarded = [];

  public function getRouteKeyName() {
    return 'slug';
  }

  public function getCategoryAttribute()
  {
    return Category::findOrFail($this->category_id)->name;
  }

  public function comments() {
    return $this->hasMany(Comment::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function files() {
    return $this->morphMany(File::class, 'fileable');
  }

}

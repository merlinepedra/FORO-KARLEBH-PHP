<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
      return 'name';
    }

    public function followers()
    {
      return $this->belongsToMany(User::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function files()
    {
      return $this->morphMany(File::class, 'fileable');
    }
}

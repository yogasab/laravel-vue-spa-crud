<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $guarded = [];

  // public function getRouteKeyName()
  // {
  //   return 'user';
  // }

  public function question()
  {
    return $this->belongsTo(Question::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function likes()
  {
    return $this->hasMany(Like::class);
  }
}

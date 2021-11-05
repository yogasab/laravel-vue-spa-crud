<?php

namespace App\Model;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  protected $guarded = ['id'];

  protected static function boot()
  {
    parent::boot();
    static::creating(function ($question) {
      $question->slug = Str::slug($question->title);
    });
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function replies()
  {
    return $this->hasMany(Reply::class);
  }

  public function getPathAttribute()
  {
    return "/question/$this->slug";
  }
}

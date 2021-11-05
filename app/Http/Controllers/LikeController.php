<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{

  public function __construct()
  {
    $this->middleware('jwt');
  }


  public function likeReply(Reply $reply)
  {
    $reply->likes()->create([
      'user_id' => '1'
    ]);
    return response()->json([
      'message' => 'Like successfully'
    ]);
  }

  public function dislikeReply(Reply $reply)
  {
    $reply->likes()->where('user_id', '1')->first()->delete();
    return response()->json([
      'message' => 'Dislike successfully'
    ]);
  }
}

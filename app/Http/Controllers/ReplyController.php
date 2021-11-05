<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

  public function __construct()
  {
    $this->middleware('jwt', ['except' => ['index', 'show']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Question $question)
  {
    $reply = $question->replies;
    return ReplyResource::collection($reply);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ReplyRequest $request, Question $question)
  {
    $validatedData = $request->all();
    $question->replies()->create($validatedData);
    return response()->json([
      'success' => true,
      'data' => $validatedData,
      'message' => 'New reply created successfully'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Model\Reply  $reply
   * @return \Illuminate\Http\Response
   */
  public function show(Question $question, Reply $reply)
  {
    return new ReplyResource($reply);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Model\Reply  $reply
   * @return \Illuminate\Http\Response
   */
  public function update(Question $question, Request $request, Reply $reply)
  {
    $reply->update($request->all());
    return response()->json([
      'success' => true,
      'message' => 'Reply updated successfully'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Model\Reply  $reply
   * @return \Illuminate\Http\Response
   */
  public function destroy(Question $question, Reply $reply)
  {
    $reply->delete();
    return response()->json([
      'success' => true,
      'message' => 'Reply deleted successfully'
    ]);
  }
}

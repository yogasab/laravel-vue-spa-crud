<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use Illuminate\Http\Response;

class QuestionController extends Controller
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
  public function index()
  {
    return QuestionResource::collection(Question::latest()->get());
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(QuestionRequest $request)
  {
    // $validatedData = $request->all();
    // $validatedData['slug'] = Str::slug($request->title);
    // $validatedData['user_id'] = Auth::user()->id;
    // $question = Question::create($validatedData);
    $question = Auth::user()->questions()->create($request->all());
    return response(new QuestionResource($question), Response::HTTP_CREATED);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Model\Question  $question
   * @return \Illuminate\Http\Response
   */
  public function show(Question $question)
  {
    $questions = new QuestionResource($question);
    return $questions;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Model\Question  $question
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Question $question)
  {
    $validatedData = $request->all();
    $question->update($validatedData);
    return response()->json([
      'success' => true,
      'message' => 'Questions updated'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Model\Question  $question
   * @return \Illuminate\Http\Response
   */
  public function destroy(Question $question)
  {
    $question->delete();
    return response()->json([
      'success' => true,
      'message' => "$question->title deleted successfully"
    ]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recommendation;
class RecommendationController extends Controller
{
  public function show()
  {
    $recommendations = Recommendation::all();
    return view('recommendations.recommendations',compact('recommendations'));
  }
}

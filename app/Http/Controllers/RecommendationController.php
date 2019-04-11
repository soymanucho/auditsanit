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


    public function delete(Recommendation $recommendation)
    {
      $recommendation->delete();
      return redirect()->back();
    }
    public function new()
    {
      $recommendation = New Recommendation();
      return view('recommendations.newRecommendation',compact('recommendation'));
    }
    public function save(Request $request)
    {
      $recommendation = New Recommendation();
      $this->validate(
        $request,
        [
            'name' => 'required|max:60',
        ],
        [
        ],
        [
            'name' => 'nombre',
        ]
    );
    $recommendation = new Recommendation;
    $recommendation->fill($request->all());
    $recommendation->save();
    return redirect()->route('show-recommendations');
    }
    public function edit(Recommendation $recommendation)
    {
      return view('recommendations.editRecommendation',compact('recommendation'));
    }
    public function update(Recommendation $recommendation, Request $request)
    {
      $this->validate(
        $request,
        [
            'name' => 'required|max:60',
        ],
        [
        ],
        [
            'name' => 'nombre',
        ]
    );
    $recommendation->fill($request->all());
    $recommendation->save();
    return redirect()->route('show-recommendations');
    }

}

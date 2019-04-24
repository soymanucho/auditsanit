<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Audit;
use App\User;
use App\Comment;

class CommentController extends Controller
{
  public function add(Audit $audit, Request $request)
  {
    $this->validate(
        $request,
        [
            'text' => 'required|string|max:255',

        ],
        [
        ],
        [
          'text' => 'comentario',

        ]
    );

    $audit = Audit::where('id',$audit->id)->first();
    $user = Auth::user();

    $comment = new Comment;

    $comment->user_id = $user->id;
    $comment->text = $request->text;

    $comment->audit_id = $audit->id;

    $comment->save();

    // $audit->comments()->sync(array('user_id'=>$user->id,'text'=>$request->text));
    // $audit->comments()->save();

    return redirect()->back();


  }
}

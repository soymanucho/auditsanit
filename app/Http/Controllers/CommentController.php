<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewComment;
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
            'text' => 'required|string|max:1000',

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
    $usersToNotify = collect();
    if ($comment) {
      foreach ($audit->comments as $commenta) {
        if (!($usersToNotify->search($commenta->user->id)) && ($user->id != $commenta->user->id)) {
          $usersToNotify->put('id', $commenta->user->id);
          $commenta->user->notify(new NewComment($audit,$comment,$user));
        }
      }


    }

    // $audit->comments()->sync(array('user_id'=>$user->id,'text'=>$request->text));
    // $audit->comments()->save();

    return redirect()->back();


  }
}

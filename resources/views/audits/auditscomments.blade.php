<div class="box-footer box-comments">
  @isset($audit->comments)
    @foreach ($audit->comments as $comment)
      <div class="box-comment">
        <!-- User image -->
        <img class="img-circle img-sm" src="/img/avatar.svg" alt="User Image">

        <div class="comment-text">
              <span class="username">
                {{$comment->user->person->fullName()}}
                <span class="text-muted pull-right">{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y h:m:s')}}</span>
                <span class="text-muted">{{$comment->updated_at->diffForHumans()}}</span>
              </span><!-- /.username -->
          {{$comment->text}}
        </div>
        <!-- /.comment-text -->
      </div>
    @endforeach
  @endisset

  <!-- /.box-comment -->
</div>
<div class="box-footer">
  <form action="{!! route('add-comment',compact('audit')) !!}" method="post">
    {{ csrf_field() }}
    {{ method_field('post') }}
    <img class="img-responsive img-circle img-sm" src="/img/avatar.svg" alt="Alt Text">
    <!-- .img-push is used to add margin to elements next to floating images -->
    <div class="img-push">
      <input type="text" name="text" class="form-control input-sm"  value="{{ old('text')}}" placeholder="Presioná enter para enviar el comentario">
    </div>
  </form>
</div>

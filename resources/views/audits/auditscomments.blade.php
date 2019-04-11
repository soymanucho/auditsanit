<div class="box-footer box-comments">
  @isset($audit->comments)
    @foreach ($audit->comments as $comment)
      <div class="box-comment">
        <!-- User image -->
        <img class="img-circle img-sm" src="/img/avatar.svg" alt="User Image">

        <div class="comment-text">
              <span class="username">
                User->name
                <span class="text-muted pull-right">{{$comment->created_at}}</span>
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
  <form action="#" method="post">
    <img class="img-responsive img-circle img-sm" src="/img/avatar.svg" alt="Alt Text">
    <!-- .img-push is used to add margin to elements next to floating images -->
    <div class="img-push">
      <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
    </div>
  </form>
</div>

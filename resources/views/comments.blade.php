@if (!empty($comments))
<div class="show_comments">
   @foreach($comments as $comment)
   <div class="card_comment">
      <h4>{{ $comment->name }}</h4>
      <p>{{ $comment->comment }}</p>
   </div>
   <div class="reply_form"  id="{{$comment->id}}">
      <button type="button" id="{{$comment->id}}" class="replycomment">Reply</button>
      <div class="reply_comment_form">
         <form  action="{{ route('add-comment') }}" method="post" id="reply-comment-form-{{$comment->id}}">
            @csrf
            @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
            <div class="form-group">
               <label class="col-sm-2 col-sm-2 control-label">Name</label>
               <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" required>
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-2 col-sm-2 control-label">Description</label>
               <div class="col-sm-10">
                  <textarea rows="5" cols="20" class="form-control" name="comment" required></textarea>
               </div>
            </div>
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <input type="hidden" name="blog_id" value="{{ $blog_id }}">
            <button type="submit" id="{{$comment->id}}" class="btn btn-success btnReplySubmit">Post</button>
            <button type="button" class="btn btn-success btnReplyClose">Close</button>
         </form>
      </div>
   </div>
   <div class="replies">
   @include('comments', ['comments' => $comment->replies])
</div>
   @endforeach
</div>
@endif
<script></script>
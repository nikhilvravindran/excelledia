<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            padding: 20px;
            background: #f1f1f1;
        }


        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .comment_form ,.reply_comment_form {
            display: none;
        }
        .replies{
            margin-left: 30px;
        }

    </style>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>



    <div class="row">
        @if (!empty($blog))
            <div class="card">
                <h2> {{ $blog->title }}</h2>
                <h5>By {{ $blog->author }},Posted on {{ date('d-m-Y', strtotime($blog->created_at)) }}
                </h5>
                <p>{{ $blog->description }}</p>
                <hr />
                <h4>Display Comments</h4>
  
                 @include('comments', ['comments' => $blog->comments, 'blog_id' => $blog->id])
                
            </div>


        @endif

        <hr />
        <button type="button" class="addcomment">Add Comment</button>
        <div class="comment_form">
            <form action="{{ route('add-comment') }}" method="post" id="comment-form">
                @csrf
               
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
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <button type="submit" class="btn btn-success btnSubmit">Post</button>
                <button type="button" class="btn btn-success btnClose">Close</button>
            </form>
        </div>
    </div>
   
    <script>
        $(".addcomment").click(function() {
            $(".comment_form").slideToggle("slow");
        });
        $(".btnClose").click(function() {
            $(".comment_form").slideToggle("hide");
        });


        $('.show_comments').on("click",".replycomment",function() {
            $(this).parent('.reply_form').find(".reply_comment_form").show();
        });
        $('.show_comments').on("click",".btnReplyClose",function() {
           $(this).parents('.reply_form').find(".reply_comment_form").hide();
        })
    
    </script>
</body>

</html>

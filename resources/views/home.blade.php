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


</style>
</head>
<body>



<div class="row">
    @if(!empty($blogs))
        @foreach($blogs as $blog)

    <div class="card">
      <a href="{{route('read-blog', ['id' => $blog->id])}}"><h2> {{$blog->title}}</h2></a>
      <h5>By {{$blog->author}},Posted on {{date('d-m-Y', strtotime($blog->created_at)); }}</h5>
      <p>{{\Illuminate\Support\Str::limit($blog->description,100)}}<a href="{{route('read-blog', ['id' => $blog->id])}}">Read More</a></p>
    </div>
        @endforeach
    @endif
</div>
</body>
</html>

@extends('layout.admin')
@section('content')
<a href="{{ route('add-blog') }}">Add Blog</a>
<table border='1' class="blog-table">

   <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Actions</th>
   </tr>
   @foreach($blogs as $blog)
   <tr>


      <td>{{$blog->title}}</td>
      <td>{{$blog->author}}</td>
      <td><a href="{{route('edit-blog', ['id' => $blog->id])}}">Edit</a> <a class="delete-blog" data-url="{{route('delete-blog', ['id' => $blog->id])}}" href="javascript:void(0)">Delete</a></td>

   </tr>
   @endforeach
</table>
<script type="text/javascript">

   $(document).ready(function () {

      $('.blog-table').on('click', '.delete-blog', function () {
         var url = $(this).attr('data-url');
         if (confirm('Do you want to delete.?')) {
            window.location.href = url;
         }

      })

   })

</script>

@endsection
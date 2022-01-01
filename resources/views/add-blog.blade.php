@extends('layout.admin')
@section('content')
<form action="{{route('create-blog')}}" method="POST">
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
      <label class="col-sm-2 col-sm-2 control-label">Title</label>
      <div class="col-sm-10">
         <input type="text" name="title" class="form-control">
      </div>
   </div>

   <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Author</label>
      <div class="col-sm-10">
         <input type="text" name="author" class="form-control" >
      </div>
   </div>

   <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
          <textarea rows="5" cols="20" class="form-control" name="description"></textarea>
      </div>
   </div>
  
   <button type="submit" class="btn btn-success btnSubmit">Save</button>
</form>
</div>



@endsection
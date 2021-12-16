@extends('layouts.task_master')

@section('task_content')


<div class="card">
  <div class="card-header">
  <span class="float-left">  Create Project </span>
 
      

  </div>
  <div class="card-body">
    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    @endif
    <h5 class="card-title">Project</h5>
 <form action="{{route('project.store')}}" method="post">
  @csrf


  <div class="form-group">
    <label for="exampleInputPassword1">Project Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" required>
     @error('name')
    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Project description</label>
    <textarea class="form-control" name="description" required></textarea>
  
   @error('description')
    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>


@endsection
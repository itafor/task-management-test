@extends('layouts.task_master')

@section('task_content')


<div class="card">
  <div class="card-header">
  <span class="float-left">  Create Tasks </span>
  <span class="float-right">  <a href="{{route('task.index')}}">
      
      <button class="btn btn-primary btn-sm">View Tasks</button>
  </a> </span>
  </div>
  <div class="card-body">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    @endif
    <h5 class="card-title">Tasks</h5>
 <form action="{{route('task.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Project (Option)</label>
   <select class="form-control" name="project_id" >
      <option value="">Select a project</option>
      @foreach($projects as $project)
      <option value="{{$project->id}}">{{$project->name}}</option>
      @endforeach
   </select>
   @error('project_name')
    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Task Name</label>
    <input type="text" name="task_name" class="form-control" id="exampleInputPassword1">
     @error('task_name')
    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Priority</label>
  <input type="number" min="1" class="form-control" name="priority">
   @error('priority')
    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>


@endsection
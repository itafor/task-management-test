@extends('layouts.task_master')

@section('task_content')


<div class="card">
  <div class="card-header">
  <span class="float-left">  Tasks </span>
  <span class="float-right">  <a href="{{route('task.create')}}">
      
      <button class="btn btn-primary btn-sm">Create Task</button>
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


<div class="row">

      <div class="col-xl-6">
          <div class="form-group dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                 View tasks by Project
              </button>
              <div class="dropdown-menu">
                @if(isset($projects))
                 @foreach($projects as $project)
                  
                  <a class="dropdown-item" href="{{ route('project.view', [$project->id]) }}">{{$project->name}}</a>
                 @endforeach
                  @endif
              </div>
          </div>
      </div>

     
  </div>
    <h5 class="card-title">Tasks</h5>


            <table id="table" class="table table-bordered">
              <thead>
                <tr>
                  <th width="30px">#</th>
                  <th>Nmae</th>
                  <th>Priority</th>
                  <th>Created At</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody id="tablecontents">
                @foreach($tasks as $task)
                  <tr class="task_items" data-id="{{ $task->id }}">
                    <td class="pl-3"><i class="fa fa-sort"></i></td>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ date('d-m-Y h:m:s',strtotime($task->created_at)) }}</td>
                    <td>
                    <a href="{{route('task.edit',[$task->id])}}">
                        <button class="btn btn-primary btn-sm">Edit</button>
                    </a>
                    </td>
                     <td>
                    <a onclick="return confirm('Are you sure?')" href="{{route('task.delete',[$task->id])}}">
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </a>
                    </td>

                  </tr>
                @endforeach
              </tbody>                  
            </table>
            <hr>
            <button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH TASK</button> 
 
  </div>
</div>


@endsection
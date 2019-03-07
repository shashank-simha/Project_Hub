@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading nav-bg" style="color:whitesmoke"><b>Tasks</b> <a class="ybtn ybtn-white ybtn-shadow" href="{{route('tasks.create')}}">Add Task</a></div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($tasks as $task)
                        <li class="list-group-item nav-bg" style="color: whitesmoke"><a href="{{route('tasks.show', $task->id)}}"  style="color: whitesmoke; margin-left: 2%; margin-right: 2%;"> <b>{{$task->name}}</b> </a><span>  <i>under the project</i> <a href="{{route('projects.show', $task->project_id)}}"  style="color: whitesmoke; margin-left: 2%; margin-right: 2%;">{{$task->project->name}}</a></span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
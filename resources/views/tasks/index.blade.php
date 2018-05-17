@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Tasks <a class="btn btn-warning pull-right btn-sm" href="{{route('tasks.create')}}">Add Task</a></div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($tasks as $task)
                        <li class="list-group-item"><a href="{{route('tasks.show', $task->id)}}"> {{$task->name}} </a><span>    under the project <a href="{{route('projects.show', $task->project_id)}}">{{$task->project->name}}</a></span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
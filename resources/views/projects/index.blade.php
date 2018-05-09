@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Projects <a class="btn btn-warning pull-right btn-sm" href="{{route('projects.create')}}">Add Project</a></div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($projects as $project)
                        <li class="list-group-item"><a href="{{route('projects.show', $project->id)}}"> {{$project->name}} </a><span>    created by <a href="{{route('companies.show', $project->company_id)}}">{{$project->company->name}}</a></span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
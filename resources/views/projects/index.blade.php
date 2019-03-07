@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading nav-bg" style="color:whitesmoke"><b>Projects</b> <a class="ybtn ybtn-white ybtn-shadow" href="{{route('projects.create')}}">Add Project</a></div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($projects as $project)
                        <li class="list-group-item nav-bg" style="color: whitesmoke"><a href="{{route('projects.show', $project->id)}}" style="color: whitesmoke; margin-left: 2%; margin-right: 2%;"> <b>{{$project->name}}</b> </a><span>    <i>created by</i> <a href="{{route('companies.show', $project->company_id)}}"  style="color: whitesmoke; margin-left: 2%; margin-right: 2%;"> {{$project->company->name}}</a></span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
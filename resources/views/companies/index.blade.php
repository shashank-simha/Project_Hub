@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Companies <a class="btn btn-warning pull-right btn-sm" href="{{route('companies.create')}}">Create Company</a></div>
        <div class="panel-body">

        <ul class="list-group">
            @foreach($companies as $company)
                <li class="list-group-item"><a href="/companies/{{$company->id}}"> {{$company->name}} </a></li>
            @endforeach
        </ul>
        </div>
    </div>
    </div>
@endsection
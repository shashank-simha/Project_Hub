@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading nav-bg" style="color:whitesmoke"><b>Companies</b> <a class="ybtn ybtn-white ybtn-shadow" href="{{route('companies.create')}}">Create Company</a>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($companies as $company)
                        <li class="list-group-item nav-bg"><a href="/companies/{{$company->id}}" style="color: whitesmoke"> {{$company->name}} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
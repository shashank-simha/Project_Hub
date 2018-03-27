@extends('layouts.app')

@section('content')

    <div class="col-sm-9 pull-left">
    <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
    </div>

    <div class="row">
        @foreach($company->projects as $project)
            <div class="col-sm-4">
                <h2>{{$project->name}}</h2>
                <p class="text-danger" style="overflow-wrap: break-word">{{$project->description}}</p>
                <p><a class="btn btn-primary" href="#" role="button">View Project >></a></p>
            </div>
        @endforeach
    </div>
    </div>

    <div class="col-sm-3 pull-right">
        <div class="sidebar-moduel">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
                <li>
                    <a href="#" id="delete" onclick="del()">Delete</a>
                    <form id="delete-form" action="{{route('companies.destroy', [$company->id])}}" method="post" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>

                </li>
            </ol>
        </div>

    </div>
<script>
        function del()
        {
         var result = confirm('Are you sure you wish to delete this company?');
         if(result)
         {
             event.preventDefault();
             $('#delete-form').submit();
         }
        }

</script>
@endsection
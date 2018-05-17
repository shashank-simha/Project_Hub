@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 pull-left">
    <div class="">
    <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
    </div>
        <div class="pull-right"><a class="btn pull-right btn-primary" href="{{route('projects.create')}}" style="background: #ffffff;color: #7a91ff;">Add Project</a></div>
    </div>
        <div class="row col-md-6">
        <form method="post" action="{{ route('comments.store') }}">
            {{csrf_field()}}
            <input type="hidden" name="commentable_type" value="App\Models\Company">
            <input type="hidden" name="commentable_id" value="{{$company->id}}">
                <div class="form-group">
                <label for="comment-content">Comment</label>
                <textarea placeholder="Enter Your comment here"
                          id="comment-content"
                          name="comment"
                          rows="3"
                          spellcheck="true"
                          class="form-control autosize-target text-left">
                    </textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            </form>
        </div>
        @include('partials.comments')
        <div class="row">
        <div class="col-sm-12 col-md-12">
        @foreach($company->projects as $project)
            <div class="col-sm-12 col-md-4 well well-sm well-md">
                <h2>{{substr($project->name, 0, 10)}}</h2>
                <p class="text-danger" style="overflow-wrap: break-word ">{{substr($project->description, 0, 30).'...'}}</p>
                <p class="pull-right"><a class="btn btn-primary" href="{{route('projects.show', [$project->id])}}" role="button">View Project >></a></p>
            </div>
        @endforeach
        </div>
    </div>
    </div>

    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
        <div class="sidebar-moduel">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="{{route('companies.edit', [$company->id])}}">Edit</a></li>
                <li>
                    <a href="#" id="delete" onclick="del()">Delete</a>
                    <form id="delete-form" action="{{route('companies.destroy', [$company->id])}}" method="post" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>
                </li>
                <li><a href="{{route('projects.create')}}">Add Project</a></li>
                <li><a href="{{route('companies.create')}}">Create Company</a></li>
            </ol>
        </p>
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
@extends('layouts.app')

@section('content')

    <div class="col-sm-9 pull-left">
        <div class="well well-md">
            <h1>{{$project->name}}</h1>
            <h4>created by <a href="{{route('companies.show', $project->company_id)}}">{{$project->company->name}}</a></h4>
            <p class="lead">{{$project->description}}</p>
        </div>
        <div class="pull-right"><a class="btn pull-right btn-primary" href="{{route('tasks.create')}}" style="background: #ffffff;color: #7a91ff;">Add Task</a></div>
        <div class="col-md-6">
        <form method="post" action="{{ route('comments.store') }}">
            {{csrf_field()}}
            <input type="hidden" name="commentable_type" value="App\Models\Project">
            <input type="hidden" name="commentable_id" value="{{$project->id}}">
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
            <div class="col-sm-12">
                @foreach($project->tasks as $task)
                    <div class="col-sm-4">
                        <h2>{{$task->name}}</h2>
                        <p class="text-danger" style="overflow-wrap: break-word">{{$task->description}}</p>
                        <p><a class="btn btn-primary" href="{{route('tasks.show', [$task->id])}}" role="button">View Project >></a></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-sm-3 pull-right">
        <div class="sidebar-moduel">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="{{route('projects.edit',$project->id)}}">Edit</a></li>
                <li>
                    <a href="#" id="delete" onclick="del()">Delete</a>
                    <form id="delete-form" action="{{route('projects.destroy', [$project->id])}}" method="post" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>

                </li>
                <li><a href="{{route('tasks.create')}}">Add Task</a></li>
                <li><a href="{{route('projects.create')}}">Add Project</a></li>
            </ol>
            <hr/>

            <h4>Add members</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12  col-sm-12 ">
                    <form id="add-user" action="{{ route('projects.adduser') }}"  method="POST" >
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input class="form-control" name = "project_id" id="project_id" value="{{$project->id}}" type="hidden">
                            <input type="text" required class="form-control" id="email"  name = "email" placeholder="Email">
                            <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="addMember" >Add!</button>
                  </span>
                        </div><!-- /input-group -->
                    </form>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br/>
            <h4>Team Members</h4>
            <ol class="list-unstyled" id="member-list">
                @foreach($project->users as $user)
                    <li><a href="#"> {{$user->email}} </a> </li>
                @endforeach
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
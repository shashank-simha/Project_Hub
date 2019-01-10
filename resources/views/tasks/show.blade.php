@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 pull-left">
        <div>
            <div class="well well-md">
            <h1>{{$task->name}}</h1>
            <h4>under Project <a href="{{route('projects.show', $task->project_id)}}">{{$task->project->name }}</a>
                created by <a href="{{route('companies.show', $task->company_id)}}">{{$task->company->name}}</a>
            </h4>
            <p class="lead">{{$task->description}}</p>
        </div>
        </div>
        <div class="row col-md-6">
            <form method="post" action="{{ route('comments.store') }}">
                {{csrf_field()}}
                <input type="hidden" name="commentable_type" value="App\Models\Task">
                <input type="hidden" name="commentable_id" value="{{$task->id}}">
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
    </div>

    <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
        <div class="sidebar-moduel">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="{{route('tasks.edit',$task->id)}}">Edit</a></li>
                <li>
                    <a href="#" id="delete" onclick="del()">Delete</a>
                    <form id="delete-form" action="{{route('tasks.destroy', [$task->id])}}" method="post" style="display: none;">
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
                    <form id="add-user" action="{{ route('tasks.adduser') }}"  method="POST" >
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input class="form-control" name = "task_id" id="task_id" value="{{$task->id}}" type="hidden">
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
                @foreach($task->users as $user)
                    <div class="">
                        <div class="col-lg-10 col-md-10">
                            <a href="#"> {{$user->email}} </a>
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <form id="remove-user" action="{{ route('tasks.removeuser') }}"  method="POST" >
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input class="form-control" name = "task_id" id="task_id" value="{{$task->id}}" type="hidden">
                                    <input class="form-control" name = "user_id" id="user_id" value="{{$user->id}}" type="hidden">
                                </div><!-- /input-group -->
                                <a><i class="fa fa-trash" aria-hidden="true" onclick="this.parentElement.parentElement.submit()"></i></a>
                            </form>
                        </div>
                    </div><!-- /.col-lg-6 -->
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


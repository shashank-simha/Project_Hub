@extends('layouts.app')

@section('content')

    <div class="col-sm-9 pull-left">
        <div class="row col-sm-12">
            <form method="post" action="{{ route('tasks.store') }}">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="task-name">Name<span class="required">*</span></label>
                    <input placeholder="Enter Name"
                           id="task-name"
                           required
                           name="name"
                           spellcheck="false"
                           class="form-control"
                    >
                </div>
                <div class="form-group">
                    <label for="task-content">Description</label>
                    <textarea placeholder="Enter Description"
                              id="task-content"
                              name="description"
                              rows="5"
                              spellcheck="true"
                              class="form-control autosize-target text-left">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="task-days">Duration (days)<span class="required">*</span></label>
                    <input  type="number"
                            min="1"
                            max="365"
                            required
                            placeholder="Enter Duration"
                              id="task-days"
                              name="days"
                            class="form-control autosize-target text-left" />
                </div>
                <div class="form-group">
                    <label for="task-hours">Duration (hours)<span class="required">*</span></label>
                    <input  type="number"
                            min="1"
                            max="23"
                            required
                            placeholder="Enter Duration"
                              id="task-hours"
                              name="hours"
                            class="form-control autosize-target text-left" />
                </div>
                <div class="form-group">
                    <label for="project">Project<span class="required">*</span></label>
                    <select required
                              id="project"
                              name="project"
                             class="form-control autosize-target text-left" >
                        @foreach($projects as $project)
                            <option value="{{$project->id}}">{{$project->name}} (Company {{$project->company->name}})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <div class="col-sm-3 pull-right">
        <div class="sidebar-moduel">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/companies">All companies</a></li>
                <li><a class="alert-link" href="{{route('companies.index',['id'=>'1'])}}">My companies</a></li>
            </ol>
            <ol class="list-unstyled">
                <li><a href="/projects">All projects</a></li>
                <li><a class="alert-link" href="{{route('projects.index',['id'=>'1'])}}">My projects</a></li>
            </ol>
        </div>

    </div>

@endsection
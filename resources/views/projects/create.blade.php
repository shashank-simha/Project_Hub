@extends('layouts.app')

@section('content')

    <div class="col-sm-9 pull-left">
        <div class="row col-sm-12">
            <form method="post" action="{{ route('projects.store') }}">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="project-name">Name<span class="required">*</span></label>
                    <input placeholder="Enter Name"
                           id="project-name"
                           required
                           name="name"
                           spellcheck="false"
                           class="form-control"
                    >
                </div>
                <div class="form-group">
                    <label for="project-content">Description</label>
                    <textarea placeholder="Enter Description"
                              id="project-content"
                              name="description"
                              rows="5"
                              spellcheck="true"
                              class="form-control autosize-target text-left">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="project-days">Duration (in days)<span class="required">*</span></label>
                    <input  type="number"
                            min="1"
                            max="365"
                            required
                            placeholder="Enter Duration"
                              id="project-days"
                              name="days"
                            class="form-control autosize-target text-left" />
                </div>
                <div class="form-group">
                    <label for="company">Company<span class="required">*</span></label>
                    <select required
                              id="company"
                              name="company"
                             class="form-control autosize-target text-left" >
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
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
        </div>

    </div>

@endsection
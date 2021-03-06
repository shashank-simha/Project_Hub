@extends('layouts.app')

@section('content')

    <div class="col-sm-9 pull-left">
        <div class="row col-sm-12">
            <form method="post" action="{{ route('companies.store') }}">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="company-name">Name<span class="required">*</span></label>
                    <input placeholder="Enter Name"
                           id="company-name"
                           required
                           name="name"
                           spellcheck="false"
                           class="form-control"
                    >
                </div>
                <div class="form-group">
                    <label for="company-content">Description</label>
                    <textarea placeholder="Enter Description"
                              id="company-content"
                              name="description"
                              rows="5"
                              spellcheck="true"
                              class="form-control autosize-target text-left">
                    </textarea>
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
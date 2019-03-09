@extends('layouts.app')

@section('content')

    <div class="col-sm-9">
        <div class="container-contact100">
            <div class="wrap-contact100">
                <div class="contact100-form-title" style="background-image: url({{ asset('images/bg-01.jpg') }});">
                    <span class="contact100-form-title-1">Update a Project</span>
                    <span class="contact100-form-title-2">Feel free to edit your project below!</span>
                </div>

                <form class="contact100-form validate-form"method="post" action="{{ route('projects.update', [$project->id]) }}">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

                    <div class="wrap-input100">
                        <span class="label-input100">Name:</span>
                        <input placeholder="Enter Name"
                               id="project-name"
                               required
                               name="name"
                               spellcheck="false"
                               class="input100"
                               value="{{$project->name}}"
                        >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <span class="label-input100">Description:</span>
                        <textarea placeholder="Enter Description"
                                  id="project-content"
                                  name="description"
                                  rows="5"
                                  spellcheck="true"
                                  class="input100">
                            {{$project->description}}
                        </textarea>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <span class="label-input100">Duration (in days):</span>
                        <input placeholder="Enter Duration"
                               id="project-days"
                               name="days"
                               type="number"
                               min="1"
                               max="365"
                               required
                               class="input100"
                               value="{{$project->days}}"
                        >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <span class="label-input100">Company:</span>
                        <select required
                                id="company"
                                name="company"
                                class="input100">
                            @foreach($companies as $company)
                                <option @if($company->id == $project->company_id) selected @endif value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn"><span>Submit<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="container-contact100">
            <div class="wrap-contact100">
                <div class="btn-holder">
                    <a href="/companies" class="ybtn ybtn-header-color">All companies</a>
                </div>
                <div class="btn-holder">
                    <a href="{{route('companies.index',['id'=>'1'])}}" class="ybtn ybtn-header-color">My companies</a>
                </div>
            </div>

            <div class="wrap-contact100">
                <div class="btn-holder">
                    <a href="/projects" class="ybtn ybtn-header-color">All projects</a>
                </div>
                <div class="btn-holder">
                    <a href="{{route('projects.index',['id'=>'1'])}}" class="ybtn ybtn-header-color">My projects</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')

    <div class="col-sm-9">
        <div class="container-contact100">
            <div class="wrap-contact100">
                <div class="contact100-form-title" style="background-image: url({{ asset('images/bg-01.jpg') }});">
                    <span class="contact100-form-title-1">Create a Company</span>
                    <span class="contact100-form-title-2">Feel free to add your own company below!</span>
                </div>

                <form class="contact100-form" method="post" action="{{ route('companies.store') }}">
                    {{csrf_field()}}

                    <div class="wrap-input100">
                        <span class="label-input100">Name:</span>
                        <input placeholder="Enter Name"
                               id="company-name"
                               required
                               name="name"
                               spellcheck="false"
                               class="input100"
                        >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100">
                        <span class="label-input100">Description:</span>
                        <textarea placeholder="Enter Description"
                                  id="company-content"
                                  name="description"
                                  rows="5"
                                  spellcheck="true"
                                  class="input100">
                        </textarea>
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
        </div>
    </div>

@endsection
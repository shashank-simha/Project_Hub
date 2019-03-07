@extends('layouts.app')

@section('content')
<div class="container">
    <div id="form-section" class="container-fluid signin">
        <div class="row top-buffer">
            <div class="info-slider-holder">
                <div class="info-holder">
                    <h6>A Service you can anytime modify.</h6>
                    <div class="bold-title">it’s not that hard to get<br>
                        a website <span>anymore.</span></div>
                    <div class="mini-testimonials-slider">
                        <div>
                            <div class="details-holder">
                                <img class="photo" src="{{ asset('images/person1.jpg') }}" alt="">
                                <h4>Chris Walker</h4>
                                <h5>CEO & CO-Founder @HelloBrandio</h5>
                                <p>“In hostify we trust. I am with them for over
                                    7 years now. It always felt like home!
                                    Loved their customer support”</p>
                            </div>
                        </div>
                        <div>
                            <div class="details-holder">
                                <img class="photo" src="{{ asset('images/person2.jpg') }}" alt="">
                                <h4>Chris Walker</h4>
                                <h5>CEO & CO-Founder @HelloBrandio</h5>
                                <p>“In hostify we trust. I am with them for over
                                    7 years now. It always felt like home!
                                    Loved their customer support”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-holder">
                <div class="menu-holder">
                    <ul class="main-links">
                        <li><a class="normal-link" href="{{ route('register') }}">Don’t have an account?</a></li>
                        <li><a class="sign-button" href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
                <div class="signin-signup-form">
                    <div class="form-items">
                        <div class="form-title">Login to your account</div>
                        <form id="signinform"method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="form-text">
                                    <input id="email" type="email" class="form-control" placeholder="E-mail Address" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="form-text">
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-button">
                                <button id="submit" type="submit" class="ybtn ybtn-accent-color">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

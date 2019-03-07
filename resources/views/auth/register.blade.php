@extends('layouts.app')

@section('content')
<div class="container">
    <div id="form-section" class="container-fluid signup">
        <div class="row">
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
                        <li><a class="normal-link" href="{{ route('login') }}">You have an account?</a></li>
                        <li><a class="sign-button" href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
                <div class="signin-signup-form">
                    <div class="form-items">
                        <div class="form-title">Register for new account</div>
                        <form id="signupform" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="form-text">
                                    <input id="name" type="text" class="form-control" placeholder="Fullname" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="form-text">
                                <input id="email" type="email" class="form-control" placeholder="E-mail address" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="form-text">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-text">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-button">
                                <button id="submit" type="submit" class="ybtn ybtn-accent-color">Create new account</button>
                            </div>
                        </form>
                        <div class="bottom-buffer top-buffer" style="visibility: hidden">2</div>
                        <div class="bottom-buffer top-buffer" style="visibility: hidden">2</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

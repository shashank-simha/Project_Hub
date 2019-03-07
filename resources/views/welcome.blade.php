@extends('layouts.app')

@section('content')
    <div class="bottom-buffer invisible">2</div>
    <div class="bottom-buffer invisible">2</div>
    <div class="invisible">2</div>

    <div id="header-holder" class="main-header top-buffer">
        <div class="bg-animation">
            <div class="graphic-show">
                <img class="fix-size" src="{{ asset('images/graphic1.png') }}" alt="">
                <img class="img img1" src="{{ asset('images/graphic1.png') }}" alt="">
                <img class="img img2" src="{{ asset('images/graphic2.png') }}" alt="">
                <img class="img img3" src="{{ asset('images/graphic3.png') }}" alt="">
            </div>
        </div>
        <div id="top-content" class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="main-slider">
                            <div class="slide">
                                <div class="noti-holder">
                                    <a href="#">
                                        <div class="noti">
                                            <span class="badge">New</span><span class="text">Support for multiple companies.</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="spacer"></div>
                                <div class="big-title">Your very <span>own space,</span><br>anywhere, anytime.</div>
                                <p>Manage, Monitor and Manipulate your projects at your finger-tips</p>
                                <div class="btn-holder">
                                    <a href="{{ route('register') }}" class="ybtn ybtn-header-color">Register</a><a href="{{ route('login') }}" class="ybtn ybtn-white ybtn-shadow">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="header-graphic" src="{{ asset('images/graphic1.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="info" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-text">This is a perfect platform to manage projects and keep track of them. You will be able to divide work among your members online by creating different tasks.</div>

                    <a href="{{ route('register') }}" class="ybtn ybtn-accent-color ybtn-shadow">Create Your Account</a>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row-title">Our Services</div>
                    <div class="row-subtitle">Designed to satisfy your creative needs.</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="{{ asset('images/service-icon1.svg') }}" alt="">
                        </div>
                        <div class="service-title"><a href="{{ route('companies.index') }}">Company Management</a></div>
                        <div class="service-details">
                            <p>This enables you to create, edit or delete various companies of your own.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="{{ asset('images/service-icon2.svg') }}" alt="">
                        </div>
                        <div class="service-title"><a href="{{ route('projects.index') }}">Project Management</a></div>
                        <div class="service-details">
                            <p>This enables you to create, edit or delete various projects under your companies.</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="{{ asset('images/service-icon3.svg') }}" alt="">
                        </div>
                        <div class="service-title"><a href="{{ route('tasks.index') }}">Task Management</a></div>
                        <div class="service-details">
                            <p>This enables you to create, edit or delete various tasks under projects.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="service-box">
                        <div class="service-icon">
                            <img src="{{ asset('images/service-icon4.svg') }}" alt="">
                        </div>
                        <div class="service-title"><a href="#">Work distribution</a></div>
                        <div class="service-details">
                            <p>You can add or delete members to projects and tasks</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="message1" class="container-fluid message-area">
        <div class="bg-color"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="text-other-color1">Are you ready?</div>
                    <div class="text-other-color2">create an account, or Login.</div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="buttons-holder">
                        <a href="{{ route('register') }}" class="ybtn ybtn-accent-color">Create Your Account</a><a href="{{ route('login') }}" class="ybtn ybtn-white ybtn-shadow">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-buffer invisible">2</div>
    <div class="bottom-buffer invisible">2</div>
    <div class="bottom-buffer invisible">2</div>
    <div class="bottom-buffer invisible">2</div>
    <div class="bottom-buffer invisible">2</div>

    <div id="features" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row-title">Our Service features</div>
                    <div class="row-subtitle"></div>
                </div>
            </div>
            <div class="row rtl-cols">
                <div class="col-sm-12 col-md-6">
                    <div id="features-links-holder">
                        <div class="icons-axis">
                            <img src="{{ asset('images/features-icon.png') }}" alt="">
                        </div>
                        <div class="feature-icon-holder feature-icon-holder1 opened" data-id="1">
                            <div class="animation-holder"><div class="special-gradiant"></div></div>
                            <div class="feature-icon"><i class="htfy htfy-worldwide"></i></div>
                            <div class="feature-title">%99 Uptime</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder2" data-id="2">
                            <div class="animation-holder"><div class="special-gradiant"></div></div>
                            <div class="feature-icon"><i class="htfy htfy-cogwheel"></i></div>
                            <div class="feature-title">Easy control panel</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder3" data-id="3">
                            <div class="animation-holder"><div class="special-gradiant"></div></div>
                            <div class="feature-icon"><i class="htfy htfy-location"></i></div>
                            <div class="feature-title">Data Monitoring</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder4" data-id="4">
                            <div class="animation-holder"><div class="special-gradiant"></div></div>
                            <div class="feature-icon"><i class="htfy htfy-download"></i></div>
                            <div class="feature-title">1 Click Management</div>
                        </div>
                        <div class="feature-icon-holder feature-icon-holder5" data-id="5">
                            <div class="animation-holder"><div class="special-gradiant"></div></div>
                            <div class="feature-icon"><i class="htfy htfy-like"></i></div>
                            <div class="feature-title">7/24 Support</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="features-holder">
                        <div class="feature-box feature-d1 show-details">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-worldwide"></i></span>
                                <span class="feature-title">%99 Uptime</span>
                            </div>
                            <div class="feature-details">
                                <p>Our servers have high efficiency and excellent reliability.</p>
                                <p class="invisible bottom-buffer top-buffer">2</p>
                            </div>
                        </div>
                        <div class="feature-box feature-d2">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-cogwheel"></i></span>
                                <span class="feature-title">Easy control panel</span>
                            </div>
                            <div class="feature-details">
                                <p>Easy to Create, Edit or Delete Companies, Projects or Tasks.</p>
                                <p class="invisible bottom-buffer top-buffer">2</p>
                            </div>
                        </div>
                        <div class="feature-box feature-d3">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-location"></i></span>
                                <span class="feature-title">Data Monitoring</span>
                            </div>
                            <div class="feature-details">
                                <p>Monitoring you data is an easy job with Projects Hub.</p>
                                <p class="invisible bottom-buffer top-buffer">2</p>
                            </div>
                        </div>
                        <div class="feature-box feature-d4">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-download"></i></span>
                                <span class="feature-title">1 Click Management</span>
                            </div>
                            <div class="feature-details">
                                <p>Manage your data with excellent UI/UX.</p>
                                <p class="invisible bottom-buffer top-buffer">2</p>
                            </div>
                        </div>
                        <div class="feature-box feature-d5">
                            <div class="feature-title-holder">
                                <span class="feature-icon"><i class="htfy htfy-like"></i></span>
                                <span class="feature-title">7/24 Support</span>
                            </div>
                            <div class="feature-details">
                                <p>Customer service and support is open through out the week.</p>
                                <p class="invisible bottom-buffer top-buffer">2</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonials" class="container-fluid">
        <div class="bg-color"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row-title">Testimonials</div>
                    <div class="row-subtitle">What others said about us?</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="testimonials-slider">
                        <div>
                            <div class="details-holder">
                                <img class="photo" src="images/person1.jpg" alt="">
                                <h4>Chris Walker</h4>
                                <h5>CEO & CO-Founder @HelloBrandio</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae odio eget orci finibus auctor ut eget magna.</p>
                            </div>
                        </div>
                        <div>
                            <div class="details-holder">
                                <img class="photo" src="images/person2.jpg" alt="">
                                <h4>Chris Walker</h4>
                                <h5>CEO & CO-Founder @HelloBrandio</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae odio eget orci finibus auctor ut eget magna.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="more-features" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row-title">Our Promise</div>
                    <div class="row-subtitle">Your satisfaction is guaranteed. Indeed.</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="mfeature-box">
                        <div class="mfeature-icon">
                            <i class="htfy htfy-trophy"></i>
                        </div>
                        <div class="mfeature-title">%99.9 Uptime</div>
                        <div class="mfeature-details">Our servers have high efficiency and excellent reliability.</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mfeature-box">
                        <div class="mfeature-icon">
                            <i class="htfy htfy-like"></i>
                        </div>
                        <div class="mfeature-title">Best UX Guarantee</div>
                        <div class="mfeature-details">Monitoring you data is an easy job with Projects Hub.</div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="mfeature-box">
                        <div class="mfeature-icon">
                            <i class="htfy htfy-cogwheel"></i>
                        </div>
                        <div class="mfeature-title">Best Support</div>
                        <div class="mfeature-details">Customer service and support is open through out the week.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="message2" class="container-fluid message-area normal-bg boxed">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="text-other-color1">Are you ready?</div>
                    <div class="text-other-color2">create an account, or contact us.</div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="buttons-holder">
                        <a href="{{ asset('register') }}" class="ybtn ybtn-accent-color">Create Your Account</a><a href="{{ asset('login') }}" class="ybtn ybtn-white ybtn-shadow">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
<style>
    .panel {
        display: none;
    }
</style>
@section('content')
    <div class="wrapper">

        <!--=================================
                     preloader -->

        <div id="pre-loader">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
                     preloader -->

        <!--=================================
                     login-->

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url(assets/images/lockscreen.png);">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align ">
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg "
                        style="background-image: url(images/login-inner-bg.jpg);">
                        <div class="login-fancy">
                            <h3 class="text-white mb-40">School <br> Management System</h3>

                            <div>
                                <label class="text-white">Select the login method</label>
                                <select class="custom-select" id="sectionChooser">
                                    <option selected disabled>Choose</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="parent">Parent</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>

                            <ul class="list-unstyled  pos-bot pb-30">
                                <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                                <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <d class="col-lg-4 col-md-6 bg-white ">
                        <img id="img_s5" src="{{ URL::asset('assets/images/s5.jpg') }}" alt=""/>

                        <div class="login-fancy pb-40 clearfix panel" id="admin">

                            <form method="POST" action="{{ route('login.admin') }}">
                                @csrf
                                <h6 class=" mb-5">Login as admin</h6>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">*Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="password">*Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="section-field">
                                    <div class=" remember-checkbox mb-30">
                                        <a href="#" class="float-right "> Forgot password ? </a>
                                    </div>
                                </div>
                                <button class="button "><span>Login</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>

                        <div class="login-fancy pb-40 clearfix panel" id="teacher">
                            <form method="POST" action="{{ route('login.teacher') }}">
                                @csrf
                                <h6 class=" mb-5">Login as teacher</h6>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">*Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="password">*Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="section-field">
                                    <div class=" remember-checkbox mb-30">
                                        <a href="#" class="float-right "> Forgot password ? </a>
                                    </div>
                                </div>
                                <button class="button"><span>Login</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>

                        <div class="login-fancy pb-40 clearfix panel" id="parent">
                            <form method="POST" action="{{ route('login.parent') }}">
                                @csrf
                                <h6 class=" mb-5">Login as parent</h6>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">*Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="password">*Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="section-field">
                                    <div class=" remember-checkbox mb-30">
                                        <a href="#" class="float-right "> Forgot password ? </a>
                                    </div>
                                </div>
                                <button class="button"><span>Login</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>

                        <div class="login-fancy pb-40 clearfix panel" id="student">
                            <form method="POST" action="{{ route('login.student') }}">
                                @csrf
                                <h6 class=" mb-5">Login as student</h6>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">*Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="password">*Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="section-field">
                                    <div class=" remember-checkbox mb-30">
                                        <a href="#" class="float-right "> Forgot password ? </a>
                                    </div>
                                </div>
                                <button class="button"><span>Login</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>

                </div>
            </div>
    </div>
    </section>

    <!--=================================
                     login-->

    </div>
@endsection

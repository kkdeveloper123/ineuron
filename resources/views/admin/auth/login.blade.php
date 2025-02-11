﻿@extends('admin.auth.index')
@section('title','DevsWeb : Admin Login')

@section('content')
<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->

                <form class="md-float-material form-material" action="{{route('admin.login-verify')}}" method="post">
                    @csrf
                    <div class="text-center">
                        <img src="{{asset('templates\libraries\assets\images\logo.png')}}" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Sign In</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="email" class="form-control" name="email" placeholder="Your Email Address" value="{{ old('email') }}">
                                <span class="form-bar"></span>
                                @error('email')
                                    <div class="form-valid-error">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
                                <span class="form-bar"></span>
                                @error('password')
                                    <div class="form-valid-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="forgot-phone text-right f-right">
                                        <a href="{{route('admin.forgot-password')}}" class="text-right f-w-600"> Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-inverse text-left m-b-0">Thank you.</p>
                                    <p class="text-inverse text-left"><a href="{{URL('')}}"><b class="f-w-600">Back to website</b></a></p>
                                </div>
                                <div class="col-md-2">
                                    <img src="{{asset('templates\libraries\assets\images\auth\Logo-small-bottom.png')}}" alt="small-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

@stop
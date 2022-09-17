@extends('admin.auth.index')
@section('title', 'DevsWeb : Forgot Password')
@section('content')

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form class="md-float-material form-material" action={{ route('admin.forgotEmailVerify') }}
                        method="post">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('templates\libraries\assets\images\logo.png') }}" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left">Recover your password</h3>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="Your Email Address">
                                    @error('email')
                                        <div class="form-valid-error">{{ $message }}</div>
                                    @enderror
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset
                                            Password</button>
                                    </div>
                                </div>
                                <p class="f-w-600 text-right">Back to <a href="{{ route('admin.login') }}">Login.</a></p>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="{{ URL('') }}"><b
                                                    class="f-w-600">Back to website</b></a></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{ asset('templates\libraries\assets\images\auth\Logo-small-bottom.png') }}"
                                            alt="small-logo.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

@stop

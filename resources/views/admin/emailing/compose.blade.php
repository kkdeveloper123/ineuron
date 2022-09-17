@extends('admin.index')
@section('title', 'DevsWeb : Email')
@section('content')

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">

                    <!-- Page-body start -->
                    <div class="page-body">
                        <div class="card">
                            <!-- Email-card start -->
                            <div class="card-block email-card">
                                <div class="row">
                                    @include('admin.emailing.sidebar')
                                    <!-- Right-side section start -->
                                    <div class="col-lg-12 col-xl-9">
                                        <div class="mail-body">
                                            <div class="mail-body">

                                                <div class="mail-body-content">
                                                    <form method="post" action="{{ route('admin.emailSend') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label for="to">To</label>
                                                                <select class="multiple-select col-sm-12"
                                                                    name="to" value="{{ old('to') }}">
                                                                    <option value="1">s</option>
                                                                    <option value="1sd">sad</option>
                                                                </select>
                                                                @error('to')
                                                                    <div class="form-valid-error">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="cc">CC</label>
                                                                    <select
                                                                        class="multiple-select col-sm-12"
                                                                        name="cc" value="{{ old('cc') }}">
                                                                        <option value="1">s</option>
                                                                    </select>
                                                                    @error('cc')
                                                                        <div class="form-valid-error">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col">
                                                                    <label for="bcc">BCC</label>
                                                                    <select
                                                                        class="multiple-select col-sm-12"
                                                                        name="bcc" value="{{ old('bcc') }}">
                                                                        <option value="1">s</option>
                                                                    </select>
                                                                    @error('bcc')
                                                                        <div class="form-valid-error">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="subject" class="form-control"
                                                                placeholder="Subject" value="subject here">
                                                            @error('subject')
                                                                <div class="form-valid-error">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="message" class="form-control">Put your things hear</textarea>
                                                            @error('message')
                                                                <div class="form-valid-error">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-xl-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary m-b-0">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Right-side section end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
            <!-- Main-body end -->
            <div id="styleSelector">

            </div>
        </div>
    </div>
@stop

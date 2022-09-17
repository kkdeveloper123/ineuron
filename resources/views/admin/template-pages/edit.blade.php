@extends('admin.index')
@section('title', 'DevsWeb : Edit Templates')
@section('content')

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>TEMPLATE PAGE</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('admin.templatePages') }}">Templates</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit Templates</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <form method="post" action="{{ route('admin.insertTemplate') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="temp_name">Template Name</label>
                                                    <input type="text" name="temp_name" class="form-control"
                                                        placeholder="Template Name" value="{{$single_info->temp_name}}">
                                                    @error('temp_name')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="heading">Heading</label>
                                                    <input type="text" name="heading" class="form-control"
                                                        placeholder="Heading" value="{{$single_info->heading}}">
                                                    @error('heading')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="content" class="p -0">Content</label>
                                                    <textarea class="form-control max-textarea" name="content"
                                                        maxlength="255" rows="4">{{$single_info->content}}</textarea>
                                                    @error('content')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="image" class="p -0">Image</label>
                                                    <input type="file" class="form-control" name="image">
                                                    @error('image')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                    <img src="{{ asset('admin/img/temp-pages/' . $single_info->img) }}" class="show-img-icon mt-2">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                        <label for="status" class="p-0">Status</label>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status" @if ($single_info->status == 1) checked @endif
                                                                    value="1">
                                                                <i class="helper"></i>Active
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status" @if ($single_info->status == 0) checked @endif value="0">
                                                                <i class="helper"></i>Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('status')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
            <!-- Main-body end -->
            <div id="styleSelector">

            </div>
        </div>
    </div>
@stop

@extends('admin.index')
@section('title', 'DevsWeb : Edit SEO')
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
                                        <h4>SEO</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.seoPagesIndex') }}">SEO</a>
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
                                        <h5>Edit SEO</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <form method="post"
                                            action="{{ route('admin.updateSeoContent', [$single_data->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                           <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" name="meta_title" class="form-control"
                                                    placeholder="Meta Title" value="{{ old('meta_title') ?: $single_data->meta_title  }}">
                                                    @error('meta_title')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="meta description">Meta Description</label>
                                                    <input type="text" name="meta_description" class="form-control"
                                                    placeholder="Meta Description" 
                                                    value="{{ old('meta_description') ?: $single_data->meta_description  }}">
                                                    @error('meta_description')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="og:url">OG Url</label>
                                                    <input type="text" name="og_url" class="form-control"
                                                        placeholder="OG Url" value="{{ old('og_url') ?: $single_data->og_url  }}">
                                                    @error('og_url')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="og:title">OG Title</label>
                                                    <input type="text" name="og_title" class="form-control"
                                                        placeholder="OG Title" value="{{ old('og_title') ?: $single_data->og_title  }}">
                                                    @error('og_title')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="og:description">OG Description</label>
                                                    <input type="text" name="og_description" class="form-control"
                                                        placeholder="og:description" 
                                                        value="{{ old('og_description') ?:$single_data->og_description  }}">
                                                    @error('og_description')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="keywords">Keywords</label>
                                                    <input type="text" name="keywords" class="form-control"
                                                        placeholder="keywords" value="{{ old('keywords') ?:$single_data->keywords  }}">
                                                    @error('keywords')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
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

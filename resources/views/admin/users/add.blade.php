@extends('admin.index')
@section('title', 'DevsWeb : Add Blogs')
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
                                        <h4>BLOGS</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.blogs') }}">Blogs</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a>
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
                                        <h5>Add Blogs</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <form method="post" action="{{ route('admin.insertBlogs') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Title" value="{{ old('title')}}">
                                                    @error('title')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="blog_cate">Blog Category</label>
                                                    <select class="js-example-responsive col-sm-12" name="blog_cate">
                                                        <option value="">Select Category</option>
                                                        @foreach ($blogs_cate as $blog_cate)
                                                            <option value="{{ $blog_cate->id }}"
                                                                {{ old('blog_cate') == $blog_cate->id ? 'selected' : '' }}>
                                                                {{ $blog_cate->cate_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('blog_cate')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="content" class="p-0">Content</label>
                                                    <textarea class="form-control max-textarea" name="content"
                                                        maxlength="255" rows="4">{{ old('content')}}</textarea>
                                                    @error('content')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row blog-img-block">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="image" class="p-0">Image</label>
                                                    <input type="file" class="form-control" name="image[]">
                                                    @error('image')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="form-group row">
                                                <div class="col-sm-10 col-xl-10">
                                                    <label for="image" class="p-0">Image</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="col-sm-2 col-xl-2">
                                                    <label for="image" class="p-0 w-100">Add More</label>
                                                    <button type="button" class="btn btn-warning add-blog-img"><i class="icofont icofont-plus m-0"></i></button>
                                                </div>
                                            </div> --}}

                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <button type="button" class="btn btn-warning add-blog-img"><i class="icofont icofont-plus m-0"></i></button>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                        <label for="status" class="p-0">Status</label>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status" checked="checked"
                                                                    value="1">
                                                                <i class="helper"></i>Active
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status" value="0">
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

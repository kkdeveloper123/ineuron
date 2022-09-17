@extends('admin.index')
@section('title', 'DevsWeb : Edit Faqs')
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
                                        <h4>FAQS</h4>
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
                                        <li class="breadcrumb-item"><a href="{{ route('admin.faqIndex') }}">Faqs</a>
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
                                        <h5>Edit Faqs</h5>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <form method="post"
                                            action="{{ route('admin.updateFaq', [$single_data->slug]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="heading">Heading</label>
                                                    <input type="text" name="heading" class="form-control"
                                                        placeholder="Heading" value="{{ old('heading',$single_data->heading?$single_data->heading:'') }}">
                                                    @error('heading')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="cate_id">Faq Category</label>
                                                    <select class="js-example-responsive col-sm-12" name="cate_id">
                                                        <option value="">Select Category</option>
                                                        @foreach ($faqs_cate as $faq_cate)
                                                            <option value="{{ $faq_cate->id }}"
                                                                {{ $single_data->cate_id == $faq_cate->id ? 'selected' : '' }}>
                                                                {{ $faq_cate->cate_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @error('cate_id')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="content" class="p -0">Content</label>
                                                    <textarea class="form-control max-textarea" name="content"
                                                        maxlength="255" rows="4">{{ old('heading',$single_data->content?$single_data->content:'') }}</textarea>
                                                    @error('content')
                                                        <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                        <label for="status" class="p-0">Status</label>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status"
                                                                    value="1" {{old('status',$single_data->status) == '1' ? 'checked' : ''}}>
                                                                <i class="helper"></i>Active
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status"
                                                                    value="0" {{old('status',$single_data->status) == '0' ? 'checked' : ''}}>
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

@extends('admin.index')
@section('title', 'DevsWeb : Edit Subject')
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
                                    <h4>SUBJECT</h4>
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
                                        href="{{ route('admin.subjectIndex') }}">Subject</a>
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
                                    <h5>Edit Subjet</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <form method="post"
                                    action="{{ route('admin.updateSubject', [$single_data->slug]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="name">Name</label>
                                            <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Name" value="{{ $single_data->name }}">
                                            @error('name')
                                            <div class="form-valid-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="cate_id">Category</label>
                                            <select class="js-example-placeholder-multiple col-sm-12" name="cate_id" >
                                                @foreach ($cate_info as $key => $single_info)
                                                <option value="">Select Category</option>
                                                <option value="{{ $single_info->id }}"
                                                    {{old('cate_id') == $single_info->id ? 'selected' : ''}} 
                                                    @if ($single_data->cate_id  == $single_info->id) selected @endif>
                                                    {{ $single_info->cate_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('cate_id')
                                                <div class="form-valid-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="subcate_id">Sub Category</label>
                                                <select class="js-example-placeholder-multiple col-sm-12" name="subcate_id" value="{{old('subcate_id')}}">
                                                    @foreach ($sub_cate_info as $key => $subcate_info)
                                                    <option value="">Select Category</option>
                                                    <option value="{{ $subcate_info->id}}"
                                                        {{old('subcate_id') == $subcate_info->id ? 'selected' : ''}} 
                                                        
                                                        @if($single_data->sub_cate_id == $subcate_info->id) selected @endif>
                                                        {{ $subcate_info->subcate_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcate_id')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="description" class="p -0">Description</label>
                                                    <textarea class="form-control max-textarea @error('description') is-invalid @enderror" name="description"
                                                    maxlength="255" rows="4" placeholder="Description">{{ $single_data->description }}</textarea>
                                                    @error('description')
                                                    <div class="form-valid-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12 col-xl-12">
                                                    <label for="image" class="p -0">Image</label>
                                                    <input type="file"
                                                    class="form-control @error('image') is-invalid @enderror"
                                                    name="image">
                                                    @if ($single_data->img)
                                                    <img src="{{ asset('admin/img/subjects/' . $single_data->img) }}"
                                                    class="show-img-icon mt-2">
                                                    @endif
                                                    @error('image')
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
                                                                @if ($single_data->status == 1) checked @endif
                                                                value="1">
                                                                <i class="helper"></i>Active
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <label>
                                                                <input type="radio" name="status" value="0"
                                                                @if ($single_data->status == 0) checked @endif>
                                                                <i class="helper"></i>Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @error('status')
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
    
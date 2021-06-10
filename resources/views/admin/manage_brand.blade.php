@extends('admin/layout')

@section('page_title', 'Manage Brand')
@section('container')

@php
    if ($id > 0) {
        $image_required = '';
    }
    else {
        $image_required = 'required';
    }
@endphp

<div class="content">
<!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title">Manage Brand</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
                            <li class="breadcrumb-item active">Manage Brand</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>
    <!-- end container-fluid -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="parsley-examples" action="{{route('brand.manage_brand_process')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" name="brand_name" value="{{$brand_name}}" aria-required="true" required="" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="image">Image<span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control" aria-required="true" aria-invalid="false" style="display:block;" {{$image_required}}>
                            @if($image!="")
                                <img class="mt-2" width="200px" src="{{asset('storage/media/Brands/'.$image)}}">
                            @endif
                        </div>
                        <div class="form-group text-right mb-0">
                            <a href="{{url('admin/brand')}}">
                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                    Back
                                </button>
                            </a>
                            <button class="btn btn-success waves-effect waves-light mr-1" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
</div>

@endsection
            
@extends('admin/layout')

@section('page_title', 'Add New Size')
@section('container')

<div class="content">
<!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title">Add New Size</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/size')}}">Size</a></li>
                            <li class="breadcrumb-item active">New Size</li>
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
                    <form class="parsley-examples" action="{{route('size.manage_size_process')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="form-group">
                            <label for="size">Size<span class="text-danger">*</span></label>
                            <input type="text" name="size" value="{{$size}}" aria-required="true" required="" class="form-control" id="size">
                        </div>
                        <div class="form-group text-right mb-0">
                            <a href="{{url('admin/size')}}">
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
            
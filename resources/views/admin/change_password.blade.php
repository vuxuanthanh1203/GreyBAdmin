@extends('admin/layout')

@section('page_title', 'Change Password')
@section('container')

<div class="content">
<!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title">Change Password</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
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
                    <form class="parsley-examples" action="{{route('admin.change_password_process')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="form-group">
                            <label for="current_password">Current Password<span class="text-danger">*</span></label>
                            <input type="password" name="current_password" aria-required="true" required="" class="form-control" id="current_password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password<span class="text-danger">*</span></label>
                            <input type="password" name="new_password" aria-required="true" class="form-control" id="new_password">
                        </div>
                        <div class="form-group">
                            <label for="renew_password">Retype New Password<span class="text-danger">*</span></label>
                            <input type="password" name="renew_password" aria-required="true" class="form-control" id="renew_password">
                        </div>
                        <div class="form-group text-right mb-0">
                            <a href="{{url('admin/category')}}">
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
            
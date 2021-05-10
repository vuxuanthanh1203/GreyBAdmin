@extends('admin/layout')

@section('page_title', 'Profile')

@section('container')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title">Profile</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>



    </div>
    <!-- end container-fluid -->
    <div class="content_profile col l-10">
        <div class="content_profile-wrap">
            <form action="{{route('admin.profile_process')}}" method="post" class="row" enctype="multipart/form-data">
            @csrf
                <div class="profile-avatar col-md-4">
                    <div class="upload-avatar-wrap">
                        <div class="upload-img">                           
                            <img src="{{asset('storage/media/Users/'.$image)}}" id="previmg">
                        </div>
                        <div class="button-wrap">
                            <label class="custom-file-upload">
                                <input type="file" name="image" onchange="loadimg(event)">
                                Choose image
                            </label>
                        </div>
                        <div class="upload-note">
                            <p>Maximum file size 1MB</p>
                            <p>Format: .JPG, .JPEG, .PNG</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group profile-form-group row">
                        <label class="col-md-3">Last Name</label>
                        <div class="col-md-9">
                            <input name="lastName" type="text" class="form-control" value="{{$lastName}}">
                        </div>
                    </div>
                    <div class="form-group profile-form-group row">
                        <label class="col-md-3">First Name</label>
                        <div class="col-md-9">
                            <input name="firstName" type="text" class="form-control" value="{{$firstName}}">
                        </div>
                    </div>
                    <div class="form-group profile-form-group row">
                        <label class="col-md-3">Email</label>
                        <div class="col-md-9">
                            <input name="email" type="text" class="form-control" value="{{$email}}" disabled>
                        </div>
                    </div>
                    <div class="form-group profile-form-group row">
                        <label class="col-md-3">Phone Number</label>
                        <div class="col-md-9">
                            <input name="phone" type="text" class="form-control" value="{{$phone}}">
                        </div>
                    </div>
                    <div class="form-group profile-form-group row">
                        <label class="col-md-3">Address</label>
                        <div class="col-md-9">
                            <input name="address" type="text" class="form-control" value="{{$address}}">
                        </div>
                    </div>
                    <div class="form-group profile-form-group">
                        <div class="form-group text-right mb-0 mr-5 float-right">
                            <a href="{{url('admin/dashboard')}}">
                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                    Back
                                </button>
                            </a>
                            <button class="btn btn-success waves-effect waves-light mr-1" type="submit">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var loadimg = function (event) {
        var output = document.getElementById('previmg');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

@endsection
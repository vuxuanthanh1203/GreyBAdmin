@extends('admin/layout')

@section('page_title', 'Manage Website Info')
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
                    <h3 class="page-title">Manage Website Info</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/website')}}">Website Infomation</a></li>
                            <li class="breadcrumb-item active">Manage Website Info</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>
    <!-- end container-fluid -->

    <form class="parsley-examples" action="{{route('website.manage_website_process')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="form-group">
                            <label for="address">Website Address<span class="text-danger">*</span></label>
                            <input type="text" name="address" value="{{$address}}" aria-required="true" required class="form-control" id="address">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" value="{{$phone}}" aria-required="true" class="form-control" id="phone" required>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="page-title-box">
                    <h3 class="page-title">Banner</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row" id="website_image_box">
                                        @php
                                            $loop_count_num = 1;
                                        @endphp
                                        @foreach ($bannerArr as $key=>$value)
                                            @php
                                                $loop_count_prev = $loop_count_num;
                                                $wIArr = (array)$value;
                                            @endphp
                                            <input type="hidden" name="wiid[]" id="wiid" value="{{$wIArr['id']}}">
                                            <div class="form-group col-md-4 website_images_{{$loop_count_num++}}">
                                                <label for="images">Image<span class="text-danger">*</span></label>
                                                <input type="file" name="images[]" id="images" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}} style="display:block;">
                                                @if($wIArr['images']!="")
                                                    <img class="mt-2" width="200px" src="{{asset('storage/media/Banners/'.$wIArr['images'])}}">
                                                @endif
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="control-lable mb-1">&nbsp;&nbsp;</label>
                                                @if($loop_count_num==2)
                                                    <button type="button" class="btn btn-warning waves-effect waves-light" style="display: block; margin-top: 3px" onclick="add_image_more()">
                                                        <i class="fa fa-plus mr-1"></i>
                                                        <span>Add</span>
                                                    </button>
                                                @else
                                                <a href="{{url('admin/website/website_images_delete')}}/{{$wIArr['id']}}/{{$id}}">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light" style="display: block; margin-top: 3px" onclick="remove_more({{$loop_count_prev}})">
                                                        <i class="fa fa-minus mr-1"></i>
                                                        <span>Remove</span>
                                                    </button>
                                                </a>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="form-group text-right mb-0">
                    <a href="{{url('admin/website')}}">
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

<script>
    var images_count = 1;
    function add_image_more() {
        images_count++;
        var html = '<input type="hidden" name="wiid[]" id="wiid" value=""><div class="form-group col-md-4 website_images_'+ images_count +'"><label for="images">Image<span class="text-danger">*</span></label><input type="file" name="images[]" id="images" class="form-control" aria-required="true" aria-invalid="false" required style="display:block;"></div>';

        html += '<div class="form-group col-md-2 website_images_'+ images_count +'"><label class="control-lable mb-1">&nbsp;&nbsp;</label><button type="button" class="btn btn-danger waves-effect waves-light" style="display: block; margin-top: 3px" onclick=remove_image_more("'+images_count+'")><i class="fa fa-minus mr-1"></i><span>Remove</span></button></div>';

        jQuery('#website_image_box').append(html);
    }

    function remove_image_more(images_count) {
        jQuery('.website_images_'+images_count).remove();
    }
</script>
@endsection
            
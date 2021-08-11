@extends('admin/layout')

@section('page_title', 'Manage Product')
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
                    <h3 class="page-title">Manage Product</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/product')}}">Product</a></li>
                            <li class="breadcrumb-item active">Manage Product</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>
    <!-- end container-fluid -->
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>   

    <form class="parsley-examples" action="{{route('product.manage_product_process')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="form-group">
                            <label for="name">Product Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{$name}}" aria-required="true" required class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug<span class="text-danger">*</span></label>
                            <input type="text" name="slug" value="{{$slug}}" aria-required="true" class="form-control" id="slug" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image<span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control" aria-required="true" aria-invalid="false" style="display:block;" {{$image_required}}>
                            @if($image!="")
                                <img class="mt-2" width="200px" src="{{asset('storage/media/Products/'.$image)}}">
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="code">Code<span class="text-danger">*</span></label>
                                <input type="text" name="code" value="{{$code}}" aria-required="true" class="form-control" id="code" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mrp">Historical cost<span class="text-danger">*</span></label>
                                <input type="number" name="mrp" value="{{$mrp}}" aria-required="true" class="form-control" id="mrp" required min="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="price">Price<span class="text-danger">*</span></label>
                                <input type="number" name="price" value="{{$price}}" aria-required="true" class="form-control" id="price" required min="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="category_id">Category<span class="text-danger">*</span></label>
                                <select name="category_id" aria-required="true" class="form-control" id="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($category as $item)
                                        @if($category_id==$item->id)
                                            <option selected value="{{$item->id}}">
                                        @else
                                            <option value="{{$item->id}}">
                                        @endif
                                        {{$item->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="brand_id">Brand<span class="text-danger">*</span></label>
                                <select name="brand_id" aria-required="true" class="form-control" id="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $item)
                                        @if($brand_id==$item->id)
                                            <option selected value="{{$item->id}}">
                                        @else
                                            <option value="{{$item->id}}">
                                        @endif
                                        {{$item->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type">Type<span class="text-danger">*</span></label>
                                <select name="type" aria-required="true" class="form-control" id="type" required>
                                    <option value="">Select Type</option>
                                    @foreach($types as $item)
                                        @if($type==$item->id)
                                            <option selected value="{{$item->id}}">
                                        @else
                                            <option value="{{$item->id}}">
                                        @endif
                                        {{$item->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="short_desc">Short Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="short_desc" aria-required="true" class="form-control" id="short_desc" required>{{$short_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="desc" aria-required="true" class="form-control" id="desc" required>{{$desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">Keywords<span class="text-danger">*</span></label>
                            <textarea type="text" name="keywords" aria-required="true" class="form-control" id="keywords" required>{{$keywords}}</textarea>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="page-title-box">
                    <h3 class="page-title">Product Attributes</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="row" id="product_attr_box">
                    <div class="col-md-12">
                        @php
                            $loop_count_num = 1;
                        @endphp
                        @foreach ($productAttrArr as $key=>$value)
                        @php
                            $loop_count_prev = $loop_count_num;
                            $pAArr = (array)$value;
                        @endphp
                            <div class="card" id="product_attr_{{$loop_count_num++}}">
                                <div class="card-body">
                                    <input type="hidden" name="paid[]" id="paid" value="{{$pAArr['id']}}">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for="sku">SKU<span class="text-danger">*</span></label>
                                            <input type="text" name="sku[]" aria-required="true" class="form-control" id="sku" value="{{$pAArr['sku']}}" required>
                                        </div>
                                        {{-- <div class="form-group col-md-2">
                                            <label for="mrp">MRP<span class="text-danger">*</span></label>
                                            <input type="text" name="mrp[]" aria-required="true" class="form-control" id="mrp" value="{{$pAArr['mrp']}}" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="price">Price<span class="text-danger">*</span></label>
                                            <input type="text" name="price[]" aria-required="true" class="form-control" id="price" value="{{$pAArr['price']}}" required>
                                        </div> --}}
                                        <div class="form-group col-md-4">
                                            <label for="qty">Quantity<span class="text-danger">*</span></label>
                                            <input type="text" name="qty[]" aria-required="true" class="form-control" id="qty" value="{{$pAArr['qty']}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="size_id">Size<span class="text-danger">*</span></label>
                                            <select name="size_id[]" class="form-control" id="size_id" required>
                                                <option value="">Select</option>
                                                @foreach($sizes as $item)
                                                    @if($pAArr['size_id']==$item->id)
                                                        <option value="{{$item->id}}" selected>
                                                            {{$item->size}}
                                                        </option>
                                                    @else
                                                        <option value="{{$item->id}}">
                                                            {{$item->size}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    {{-- </div>
                                    <div class="row"> --}}
                                        <div class="form-group col-md-2">
                                            <label for="size_id">&nbsp;&nbsp;&nbsp;</label>
                                            @if($loop_count_num==2)
                                                <button type="button" class="btn btn-warning waves-effect waves-light" style="display: block" onclick="add_more()">
                                                    <i class="fa fa-plus mr-1"></i>
                                                    <span>Add</span>
                                                </button>
                                            @else
                                            <a href="{{url('admin/product/product_attr_delete')}}/{{$pAArr['id']}}/{{$id}}">
                                                <button type="button" class="btn btn-danger waves-effect waves-light" style="display: block" onclick="remove_more({{$loop_count_prev}})">
                                                    <i class="fa fa-minus mr-1"></i>
                                                    <span>Remove</span>
                                                </button>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="page-title-box">
                    <h3 class="page-title">Product Images</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row" id="product_image_box">
                                        @php
                                            $loop_count_num = 1;
                                        @endphp
                                        @foreach ($productImagesArr as $key=>$value)
                                            @php
                                                $loop_count_prev = $loop_count_num;
                                                $pIArr = (array)$value;
                                            @endphp
                                            <input type="hidden" name="piid[]" id="piid" value="{{$pIArr['id']}}">
                                            <div class="form-group col-md-4 product_images_{{$loop_count_num++}}">
                                                <label for="images">Image<span class="text-danger">*</span></label>
                                                <input type="file" name="images[]" id="images" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}} style="display:block;">
                                                @if($pIArr['images']!="")
                                                    <img class="mt-2" width="200px" src="{{asset('storage/media/Products/'.$pIArr['images'])}}">
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
                                                <a href="{{url('admin/product/product_images_delete')}}/{{$pIArr['id']}}/{{$id}}">
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
                    <a href="{{url('admin/product')}}">
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
    var count = 1;
    function add_more() {
        count++;
        var html = '<div class="col-md-12"><div class="card" id="product_attr_'+count+'"><div class="card-body"><input type="hidden" name="paid[]" id="paid"><div class="row">';

        html += '<div class="form-group col-md-2"><label for="sku">SKU<span class="text-danger">*</span></label><input type="text" name="sku[]" aria-required="true" class="form-control" id="sku" required></div>';

        // html += '<div class="form-group col-md-2"><label for="mrp">MRP<span class="text-danger">*</span></label><input type="text" name="mrp[]" aria-required="true" class="form-control" id="mrp" required></div>';
        
        // html += '<div class="form-group col-md-2"><label for="price">Price<span class="text-danger">*</span></label><input type="text" name="price[]" aria-required="true" class="form-control" id="price" required></div>';

        html += '<div class="form-group col-md-4"><label for="qty">Quantity<span class="text-danger">*</span></label><input type="text" name="qty[]" aria-required="true" class="form-control" id="qty" required></div>'

        var size_id_html = jQuery('#size_id').html();
        size_id_html = size_id_html.replace('selected','');
        html += '<div class="form-group col-md-4"><label for="size_id">Size<span class="text-danger">*</span></label><select name="size_id[]" class="form-control" id="size_id">'+size_id_html+'</select></div>';

        html += '<div class="form-group col-md-2"><label class="control-lable mb-1">&nbsp;&nbsp;</label><button type="button" class="btn btn-danger waves-effect waves-light" style="display: block; margin-top: 3px" onclick=remove_more("'+count+'")><i class="fa fa-minus mr-1"></i><span>Remove</span></button></div>';

        html += '</div></div></div></div>';
        jQuery('#product_attr_box').append(html);
    }

    function remove_more(count) {
        jQuery('#product_attr_'+count).remove();
    }

    var images_count = 1;
    function add_image_more() {
        images_count++;
        var html = '<input type="hidden" name="piid[]" id="piid" value=""><div class="form-group col-md-4 product_images_'+ images_count +'"><label for="images">Image<span class="text-danger">*</span></label><input type="file" name="images[]" id="images" class="form-control" aria-required="true" aria-invalid="false" required style="display:block;"></div>';

        html += '<div class="form-group col-md-2 product_images_'+ images_count +'"><label class="control-lable mb-1">&nbsp;&nbsp;</label><button type="button" class="btn btn-danger waves-effect waves-light" style="display: block; margin-top: 3px" onclick=remove_image_more("'+images_count+'")><i class="fa fa-minus mr-1"></i><span>Remove</span></button></div>';

        jQuery('#product_image_box').append(html);
    }

    function remove_image_more(images_count) {
        jQuery('.product_images_'+images_count).remove();
    }

    CKEDITOR.replace('short_desc');
    CKEDITOR.replace('desc');
    CKEDITOR.replace('technical_specification');
</script>
@endsection
            
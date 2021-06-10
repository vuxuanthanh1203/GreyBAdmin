@extends('front/layout')

@section('container')

<div id="content">
    <div class="category-product">
        <div class="grid wide">
            <div class="row">
                <div class="title col l-12 ">
                    <h2>SNEAKERS</h2>
                </div>
                <div class="left-content col l-3">
                    <h3 class="category__heading">
                        BỘ LỌC
                    </h3>
                    <li id="filter-product">
                        <a href="" class="left-product-link">SẢN PHẨM</a>
                        <input type="checkbox" id="show-product">
                        <label class=" label" for="show-product"></label>
                        <ul class="subnav">
                            <li>
                                <a href="{{url('category/sneakers')}}" class="category_left_menu">Sneakers</a>
                            </li>
                            <li>
                                <a href="{{url('category/backpacks')}}" class="category_left_menu">BackPacks</a>
                            </li>
                            <li>
                                <a href="{{url('category/tshirt')}}" class="category_left_menu">Tshirt</a>
                            </li>
                            <li>
                                <a href="{{url('category/accessories')}}" class="category_left_menu">Accessories</a>
                            </li>
                        </ul>
                    </li>
                    <li id="trademark-product">
                        <a href="" class="left-product-link">THƯƠNG HIỆU</a>
                        <input type="checkbox" id="show-trademark-product">
                        <label class=" label" for="show-trademark-product"></label>
                        <ul class="subnav">
                            <ul class="subnav">
                                @foreach($brands_left as $brand_left)
                                    @if($slug==$brand_left->brand_name)
                                    <li class="left_cat_active"><a href="{{url('brand/'.$brand_left->brand_name)}}" class="category_left_menu category_active">{{$brand_left->brand_name}}</a></li>
                                    @else
                                    <li><a href="{{url('brand/'.$brand_left->brand_name)}}" class="category_left_menu">{{$brand_left->brand_name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </ul>
                    </li>
                    {{-- <li id="price-product">
                        <a href="" class="left-product-link">GIÁ</a>
                        <input type="checkbox" id="show-price-product">
                        <label class=" label" for="show-price-product"></label>
                        <ul class="subnav">
                            <li>
                                <input type="checkbox" class="regular-checkbox" id="price-product-s">
                                <label class=" label" for="price-product-s"></label>
                                <p>50.000 VNĐ - 200.000 VNĐ</p></li>
                            <li>
                                <input type="checkbox" class="regular-checkbox" id="price-product-m">
                                <label class=" label" for="price-product-m"></label>
                                <p>200.000 VNĐ - 600.000 VNĐ</p></li>
                            <li>
                                <input type="checkbox" class="regular-checkbox" id="price-product-l">
                                <label class=" label" for="price-product-l"></label>
                                <p>600.000 VNĐ - 1.200.000 VNĐ</p></li>
                            <li>
                                <input type="checkbox" class="regular-checkbox" id="price-product-xl">
                                <label class=" label" for="price-product-xl"></label>
                                <p>1.200.000 VNĐ - 2.000.000 VNĐ</p></li>
                        </ul>
                    </li> --}}
                    {{-- <li id="size-product">
                        <a href="" class="left-product-link">KÍCH THƯỚC</a>
                        <input type="checkbox" id="show-size-product">
                        <label class=" label" for="show-size-product"></label>
                        <ul class="check-box-list">
                            <li class="filter-item active">
                                <input type="checkbox">
                                <label>
                                    <span class="button tp_button"></span>
                                    22 </label>
                            </li>
                            <li class="filter-item">
                                <input type="checkbox">
                                <label>
                                    <span class="button tp_button"></span>
                                    23.5 </label>
                            </li>
                            <li class="filter-item">
                                <input type="checkbox">
                                <label>
                                    <span class="button tp_button"></span>
                                    24.5 </label>
                            </li>
                            <li class="filter-item">
                                <input type="checkbox">
                                <label>
                                    <span class="button tp_button"></span>
                                    24 </label>
                            </li>
                            <li class="filter-item">
                                <input type="checkbox">
                                <label>
                                    <span class="button tp_button"></span>
                                    25.5 </label>
                            </li>
                            
                        </ul>
                    </li> --}}
                </div>
                <div class="right-content col l-9">
                    <div class="list-product row">
                        <div class="top-right-content col c-12 l-12">
                            <div class="row">
                                {{-- <div class="find-product col l-8 c-6">
                                    <p class="resultCate">Tìm thấy 
                                        <span class="countCate">266</span>
                                         sản phẩm</p>
                                </div> --}}
                                <div class="sort-by col l-4 c-6">
                                    <div class="sort-by-right">
                                        <form>
                                            <label for="grid-sort-header">Sắp xếp theo:</label>
                                            <select name=""  onchange="sort_by()" id="sort_by_value">
                                                <option value="" selected>Mặc định</option>
                                                <option value="date">Mới nhất</option>
                                                <option value="name">Tên</option>
                                                <option value="price_asc">Giá tăng dần</option>
                                                <option value="price_desc">Giá giảm dần</option>
                                            </select>
                                        </form>
                                        {{$sort_txt}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($product[0]))
                        @foreach($product as $item)
                        <div class="product-item col l-4 c-6 m-6 sm-6">
                            <div class="product-image">
                                <img src="{{asset('storage/media/Products/'.$item->image)}}">
                                <div class="goodsli-discount">
                                    <img src="{{asset('front_assets/font/Icon/Path 24.png')}}" alt="">
                                    <div>
                                        <h1>62 %</h1>
                                        <h1>off</h1>
                                    </div>
                                </div>
                                <div class="button-add">
                                    {{-- <button onclick="toggleproduct();" class="tp_button"> --}}
                                    <button class="tp_button">
                                        <span>
                                            <a href="#">Mua ngay</a>
                                        </span>
                                    </button>
                                    <button title="Xem chi tiết" class="action tp_button">
                                        <span>
                                            <a href="{{url('product/'.$item->slug)}}">Xem chi tiết</a>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="swatch__list">
                                <a class="color-item">
                                    <img src="{{asset('storage/media/Products/'.$item->image)}}">
                                </a>
                            </div>
                            <a href="{{url('product/'.$item->slug)}}" class="d-block pt-2 tp_product_name">
                                <h1>{{$item->name}}</h1>
                            </a>
                            <span class="special-price">
                                <span class="tp_product_price">
                                    <h1>{{$item->price}} <sup>đ</sup></h1>
                                </span>
                                <span>
                                    <h1>{{$item->mrp}}<sup>đ</sup></h1>
                                </span>
                            </span>
                        </div>                        
                        @endforeach
                        @endif
                        {{-- <div class="bottom-right-content col c-12 l-12">
                            <div class="pagination">
                                <a class="disabled" href="#">&laquo;</a>
                                <a class="active" href="#">1</a>
                                <a  href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">&raquo;</a>
                              </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form>
    <input type="hidden" id="size_id" name="size_id">
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
</form>
<form id="categoryFilter">
    <input type="hidden" id="sort" name="sort" value="{{$sort}}"/>
  </form> 
@endsection

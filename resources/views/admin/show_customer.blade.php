@extends('admin/layout')

@section('page_title', 'Show Customer Details')

@section('container')

<div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h3 class="page-title">Customer Details</h3>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{url('admin/customer')}}">Customer</a></li>
                                        <li class="breadcrumb-item active"><a href="#">Customer Details</a></li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="datatable_wrapper"
                                                class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-striped">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                  <th scope="col">Field</th>
                                                                  <th scope="col" style="text-align: right;">Value</th>
                                                                </tr>
                                                              </thead>

                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Name</th>
                                                                    <td style="text-align: right;">{{$customer_list->name}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td style="text-align: right;">{{$customer_list->email}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Mobile</th>
                                                                    <td style="text-align: right;">{{$customer_list->mobile}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Address</th>
                                                                    <td style="text-align: right;">{{$customer_list->address}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Created At</th>
                                                                    <td style="text-align: right;">{{\Carbon\Carbon::parse($customer_list->created_at)->format('d-m-y, h:m:s')}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <th scope="row">Updated At</th>
                                                                    <td style="text-align: right;">{{\Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-y, h:m:s')}}</td>
                                                                  </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group text-right mb-0">
                                                    <a href="{{url('admin/customer')}}">
                                                        <button type="button" class="btn btn-primary waves-effect waves-light">
                                                            Back
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

@endsection
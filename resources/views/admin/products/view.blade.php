<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'Products')
@php( $page = 'Products')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <h2 class="text-center text-white">Product Information</h2>
      <!-- statistics -->
      <div class="row">
        <!-- stats card -->
        <div class="col-xl-4 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Reviews</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($reviewCount, 0, ',')}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                      Product's Reviews
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-comments text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- stats card -->
        <div class="col-xl-4 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Orders</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($orderCount, 0, ',')}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                      Product's Orders
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-shopping-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- stats card -->
        <div class="col-xl-4 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Views</p>
                    <h5 class="font-weight-bolder">
                      {{-- {{number_format($inactiveProducts, 0, ',')}} --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-eye text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder"></span>
                      Product Views
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="viewproductInfo">
        <div class="col-md-12 mx-auto">
          <div class="card mb-4">
            <div class="card-header text-center pb-0">
              <h3 class="text-center my-3">{{$product->title}}</h3>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="row mb-3">
                    <div class="col-5">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{$product->image1}}" alt="...">
                              </div>
                              @if(isset($product->image2))
                              <div class="carousel-item">
                                <img src="{{$product->image2}}" class="d-block" alt="OneStopShop">
                              </div>
                              @endif

                              @if(isset($product->image3))
                              <div class="carousel-item">
                                <img src="{{$product->image3}}" class="d-block" alt="OneStopShop">
                              </div>
                              @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Brand : </b> {{$product->brand}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>#ID : </b> {{$product->productCode}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Category : </b> {{$product->category}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Sub Category : </b> {{$product->subcategory}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Normal Price : </b> &#8358; {{number_format($product->normal_price, 2, '.', ',')}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Actual Price : </b> &#8358; {{number_format($product->price, 2, '.', ',')}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Short Description : </b> {{$product->short_desc}}
                                    </li>
                                </ol>
                            </div>

                            <div class="col-12">
                                {{-- <hr> --}}
                            </div>
                            <div class="col-md-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Status : </b> {{$product->status}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Created On : </b> <span id="middleName">{{$product->created_at}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Last Update : </b> {{$product->updated_at}}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Added By : </b> <span id="middleName">{{isset($product->adminID)?$product->admin->username:'unknown'}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Updated By : </b> {{isset($product->updated_by)?$product->updatedBy->username: ''}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <a href="{{route('admin.products.edit',[$product->id])}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                    @if($product->status == 'Active')
                    <a href="{{route('admin.products.deactivate',[$product->id])}}" class="btn btn-warning"><i class="fa fa-arrow-up"></i> Deactivate</a>
                    @else
                    <a href="{{route('admin.products.activate',[$product->id])}}" class="btn btn-success"><i class="fa fa-arrow-down"></i> Activate</a>
                    @endif
                    <a href="{{route('admin.products.delete',[$product->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </center>
            </div>
          </div>
        </div>
      </div>
      @include('components.admin.footer')
    </div>
  </main>
  @push('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script>
      function printContent(el) {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            window.location.reload(true);
      }

      document.getElementById('btnPrint').addEventListener('click',
            Export);

        function Export() {
            html2canvas(document.getElementById('viewproductInfo'), {
                onrendered: function(canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("AARasheedData-Funding.pdf");
                }
            });
        }

  </script>
@endpush

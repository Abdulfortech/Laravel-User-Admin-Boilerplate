<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Product')
@php( $page = 'products')
@section('contents')
@include('components.navbar')
<style>
</style>
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <center>
        <div class="container bg-white single_product_container col-md-11">
            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                                <div class="single_product_thumbnails">
                                    <ul class="list-unstyle">
                                        <li><img src="{{ asset('storage/' . $product->image1) }}" alt="" data-image="{{ asset('storage/' . $product->image1) }}"></li>
                                        <li class="active"><img src="{{ asset('storage/' . $product->image1) }}" alt="" data-image="{{ asset('storage/' . $product->image1) }}"></li>
                                        <li><img src="{{ asset('storage/' . $product->image1) }}" alt="" data-image="{{ asset('storage/' . $product->image1) }}"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <div class="single_product_image">
                                    <div class="single_product_image_background" style="background-image:url({{ asset('storage/' . $product->image1) }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>{{$product->title}}</h2>
                            <p class="my-1">
                                Categories : <a href="#" class="badge badge-primary text-decoration-none">{{$product->category}}</a>
                                <a href="#" class="badge badge-primary text-decoration-none">{{$product->subcategory}}</a>
                            </p>
                            <p class="my-1">
                                Vendor : <a href="{{route('vendor.view', [$product->vendorID])}}" class="text-primary font-weight-bold text-decoration-none">{{$product->vendor->name}}</a>
                            </p>
                            <p class="my-4">
                                <span>Reviews : <b class="font-weight-bold text-warning">{{$reviewCount}}</b></span> &nbsp;&nbsp;&nbsp;
                                <span>Ratings :
                                    <b class="text-warning"><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </b>
                                </span>
                            </p>
                            <!-- <hr> -->
                            <p class="my-4">{{$product->shor_desc}}</p>
                            <h4 class="mt-5">
                                {{-- <span class="text-muted  font-weight-bold"><s>&#8358; 123,000</s></span> --}}
                                <span class="text-danger font-weight-bold">&#8358; {{number_format($product->price, '2', '.', ',')}}</span>
                            </h4>
                        </div>
                        <div class="mt-5 col-12">
                            <a href="product-edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-warning"><i class="fa fa-arrow-down"></i> Deactivate</a>
                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="tabs_section_container">
            <div class="container col-11 tabs_container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Vendor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Reviews</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <div class="container mt-4 text-justify">
                            <p>{{$product->long_desc}}</p>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="menu1">
                        <div class="container mt-4">
                            <center>
                                <img src="../assets/img/pages/bg.jpg" class="rounded-circle" width="150" height="150" alt="">
                                <h3 class="mb-0"><a href="#" class="text-primary font-weight-bold">Kwalisa Fashion & Design</a></h3>
                                <h6 class="my-1">@ <a href="#" class="text-muted">kwalisa</a></h6>
                                <h5>
                                    <span> Reviews <i class="fa fa-comments"></i> 23</span> |
                                    <span> Products <i class="fa fa-sitemap"></i> 13</span> |
                                    <span> Orders <i class="fa fa-shopping-cart"></i> 13</span>
                                </h5>
                            </center>
                            <div class="row text-left mt-4">
                                <div class="col-12"><h3>Latest Products</h3></div>
                                <!-- product -->
                                <div class="col-md-3">
                                    <a href="product-view.html" class="card product-card border shadow-sm">
                                        <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                                        <div class="card-body text-left p-2">
                                            <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                                            <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                                            <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                                        </div>
                                    </a>
                                </div>
                                <!-- product -->
                                <div class="col-md-3">
                                    <a href="product-view.html" class="card product-card border shadow-sm">
                                        <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                                        <div class="card-body text-left p-2">
                                            <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                                            <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                                            <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                                        </div>
                                    </a>
                                </div>
                                <!-- product -->
                                <div class="col-md-3">
                                    <a href="product-view.html" class="card product-card border shadow-sm">
                                        <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                                        <div class="card-body text-left p-2">
                                            <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                                            <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                                            <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                                        </div>
                                    </a>
                                </div>
                                <!-- product -->
                                <div class="col-md-3">
                                    <a href="product-view.html" class="card product-card border shadow-sm">
                                        <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                                        <div class="card-body text-left p-2">
                                            <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                                            <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                                            <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <center><a href="#" class="btn btn-primary">View More</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane col-12 fade" id="menu2">
                        <div class=" mt-4">
                            <h2>Reviews(23)</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="review-container">
                                        <!-- single review -->
                                        <div class="card mt-3">
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>

                                                        <h4><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h4>
                                                    </div>
                                                </div>
                                                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                                <h6 class="text-left"><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                            </div>
                                        </div>
                                        <!-- single review -->
                                        <div class="card mt-3">
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>

                                                        <h4><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h4>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                                <h6 class=""><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                            </div>
                                        </div>
                                        <!-- single review -->
                                        <div class="card mt-3">
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>

                                                        <h4><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h4>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                                <h6 class=""><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                            </div>
                                        </div>
                                        <!-- single review -->
                                        <div class="card mt-3">
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>

                                                        <h4><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h4>
                                                    </div>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                                <h6 class=""><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <form action="" class="card mt-4 text-left">
                                        <div class="card-body p-3">
                                            <h4>Write A Review</h4>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input class="form-control" placeholder="Name" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input class="form-control" placeholder="Phone Number" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Review</label>
                                                <textarea class="form-control" rows="6"></textarea>
                                            </div>
                                            <center><button type="submit" class="btn btn-primary">Submit</button></center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

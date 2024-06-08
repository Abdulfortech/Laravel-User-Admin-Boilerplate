<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | My Products')
@php( $page = 'products')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container col-md-11">
      <div class="col-lg-12 px-0">
          <!-- section head -->
          <div class="section-head my-5 text-center">
              <h1 class="mb-5 font-weight-bold">
              <span>My Products</span>
              </h1>
          </div>
          <!-- analytics -->
          <div class="row mb-4">
              <!-- <div class="col-12"><h4>Stats</h4></div> -->
              <div class="col-md-4 col-12 mb-2">
                  <div class="card info-card sales-card rounded">
                      <a class="card-body">
                          <div class="row">
                              <div class="col-12">
                                  <h5 class="card-title pt-0 my-0">All Products</h5>
                              </div>
                              <div class="col-4 py-2 text-center">
                                  <span class="fa-stack fa-2x">
                                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                      <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                                  </span>
                              </div>
                              <div class="col-8">
                                  <div class="ps-3">
                                      <h3 class="font-weight-bold mb-1">{{$allProduct}}</h3>
                                      <span class="text-primary small pt-1 fw-bold">{{$allProduct}}</span> <span class="text-muted small pt-2 ps-1">Total Products</span>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- card -->
              <div class="col-md-4 col-12 mb-2">
                  <div class="card info-card sales-card rounded">
                      <a class="card-body">
                          <div class="row">
                              <div class="col-12">
                                  <h5 class="card-title pt-0 my-0">Active Products<span></span></h5>
                              </div>
                              <div class="col-4 py-2 text-center">
                                  <span class="fa-stack fa-2x">
                                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                      <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                                  </span>
                              </div>
                              <div class="col-8">
                                  <div class="ps-3">
                                      <h3 class="font-weight-bold mb-1">{{$activeProduct}}</h3>
                                      <span class="text-primary small pt-1 fw-bold">{{$activeProduct}}</span> <span class="text-muted small pt-2 ps-1">Active Products</span>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
              <!-- card -->
              <div class="col-md-4 col-12 mb-2">
                  <div class="card info-card sales-card rounded">
                      <a class="card-body">
                          <div class="row">
                              <div class="col-12">
                                  <h5 class="card-title pt-0 my-0">Inactive Products<span></span></h5>
                              </div>
                              <div class="col-4 py-2 text-center">
                                  <span class="fa-stack fa-2x">
                                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                      <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                                  </span>
                              </div>
                              <div class="col-8">
                                  <div class="ps-3">
                                      <h3 class="font-weight-bold mb-1">{{$inactiveProduct}}</h3>
                                      <span class="text-primary small pt-1 fw-bold">{{$inactiveProduct}}</span> <span class="text-muted small pt-2 ps-1">Inactive Products</span>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          <hr>
          <!-- products list -->
          <div class="row">
            <div class="col-lg-12 ">
                  <div class="row">
                    @foreach($products as $product)
                      <!-- product -->
                      <div class="col-md-3 col-6">
                          <a href="{{route('product.view', [$product->id])}}" class="card product-card border shadow-sm">
                              <img src="{{ asset('storage/' . $product->image1) }}" class="card-img-top" alt="Product 1">
                              <div class="card-body text-left p-2">
                                  <span class="badge bg-info font-weight-bold text-white mb-1">{{$product->subcategory}}</span>
                                  <span class="badge bg-primary font-weight-bolder text-white">&#8358; {{number_format($product->price, '2', '.', ',')}}</span>
                                  <h6 class="card-title">{{substr($product->title,0,70)}}</h6>
                              </div>
                          </a>
                      </div>
                    @endforeach

                      <div class="col-12 mt-4 d-flex justify-contents-center align-items-center text-center">
                          <nav aria-label="Page navigation example" class="mb-4">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="javascript:;">1</a>
                              </li>
                              <li class="page-item active">
                                <a class="page-link" href="javascript:;">2</a>
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="javascript:;">3</a>
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="javascript:;">4</a>
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="javascript:;">5</a>
                              </li>
                            </ul>
                          </nav>
                      </div>
                  </div>
            </div>
          </div>


      </div>
  </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Dashboard')
@php( $page = 'home')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <!-- hero -->
      <div class="section section-hero section-shaped rounded my-4">
          <div class="shape shape-style-1 shape-primary">
              <span class="span-150"></span>
              <span class="span-50"></span>
              <span class="span-50"></span>
              <span class="span-75"></span>
              <span class="span-100"></span>
              <span class="span-75"></span>
              <span class="span-50"></span>
              <span class="span-100"></span>
              <span class="span-50"></span>
              <span class="span-100"></span>
          </div>
          <div class="container-fluid py-5 p-5 text-white">
              <h1 class="display-5 font-weight-bolder text-white">Welcome {{auth()->user()->firstName}}!</h1>
              <p class="col-md-8 h5 text-white">This is your account dashboard where you can manage your activities on this platform.</p>
              @if(auth()->user()->type == "Vendor")
                <a href="listing-new" class="btn btn-primary btn-lg" type="button"> New Product</a>
              @else
              @endif
          </div>
      </div>
      <!-- stats -->
      <div class="col-lg-12 px-0">
          <!-- section head -->
          <div class="section-head my-5 text-center">
              <h1 class="mb-5 font-weight-bold">
              <span>User's Dashboard</span>
              </h1>
          </div>
          <div class="row">
            {{-- card --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="vendors" class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-title pt-0 my-0">Orders<span></span></h5>
                            </div>
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-briefcase fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">3453,09</h3>
                                    <span class="text-primary small pt-1 fw-bold">3</span> <span class="text-muted small pt-2 ps-1">Total Businesses</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- card --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="vendors" class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-title pt-0 my-0">Reviews<span></span></h5>
                            </div>
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-briefcase fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">3453,09</h3>
                                    <span class="text-primary small pt-1 fw-bold">3</span> <span class="text-muted small pt-2 ps-1">Total Businesses</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- card --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="vendors" class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="card-title pt-0 my-0">Messages<span></span></h5>
                            </div>
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-briefcase fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">3453,09</h3>
                                    <span class="text-primary small pt-1 fw-bold">3</span> <span class="text-muted small pt-2 ps-1">Total Businesses</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
          </div>
        @if(auth()->user()->type == "Vendor")
          <!-- section head -->
          <div class="section-head my-5 text-center">
              <h1 class="mb-5 font-weight-bold">
              <span>Vendor's Dashboard</span>
              </h1>
          </div>

            <div class="row">
                {{-- card --}}
                <div class="col-md-3 col-12 mb-2">
                    <div class="card info-card sales-card rounded">
                        <a href="vendors" class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title pt-0 my-0">Vendors<span></span></h5>
                                </div>
                                <div class="col-4 py-2 text-center">
                                    <span class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-briefcase fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="col-8">
                                    <div class="ps-3">
                                        <h3 class="font-weight-bold mb-1">3453,09</h3>
                                        <span class="text-primary small pt-1 fw-bold">3</span> <span class="text-muted small pt-2 ps-1">Total Businesses</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- card -->
                <div class="col-md-3 col-12 mb-2">
                    <div class="card info-card sales-card rounded">
                        <a href="listings" class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title pt-0 my-0">Products<span></span></h5>
                                </div>
                                <div class="col-4 py-2 text-center">
                                    <span class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="col-8">
                                    <div class="ps-3">
                                        <h3 class="font-weight-bold mb-1">3453,09</h3>
                                        <span class="text-primary small pt-1 fw-bold">3</span> <span class="text-muted small pt-2 ps-1">Total Listings</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- card -->
                <div class="col-md-3 col-12 mb-2">
                    <div class="card info-card sales-card rounded">
                        <a href="#" class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title pt-0 my-0">Reviews<span></span></h5>
                                </div>
                                <div class="col-4 py-2 text-center">
                                    <span class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-comments fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="col-8">
                                    <div class="ps-3">
                                        <h3 class="font-weight-bold mb-1">3453,09</h3>
                                        <span class="text-primary small pt-1 fw-bold">3</span> <span class="text-muted small pt-2 ps-1">Total Reviews</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <!-- card -->
                <div class="col-md-3 col-12 mb-2">
                    <div class="card info-card sales-card rounded">
                        <a href="orders" class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title pt-0 my-0">Orders<span></span></h5>
                                </div>
                                <div class="col-4 py-2 text-center">
                                    <span class="fa-stack fa-2x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="col-8">
                                    <div class="ps-3">
                                        <h3 class="font-weight-bold mb-1">3453,09</h3>
                                        <span class="text-primary small pt-1 fw-bold">3</span> <span class="text-muted small pt-2 ps-1">Total Services</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif

      </div>
  </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

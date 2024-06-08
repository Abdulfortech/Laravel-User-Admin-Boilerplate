<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | My Account')
@php( $page = 'account')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <!-- stats -->
      <div class="col-lg-12 px-0">
          <!-- section head -->
          <div class="section-head my-5 text-center">
              <h1 class="mb-5 font-weight-bold">
              <span>My Account</span>
              </h1>
          </div>
          <div class="row">
            {{-- orders --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="{{route('user.orders')}}" class="card-body">
                        <div class="row">
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">Orders</h3>
                                    <span class="text-primary small pt-1 fw-bold">My Orders</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- reviews --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="{{route('user.reviews')}}" class="card-body">
                        <div class="row">
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-comments fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">Reviews</h3>
                                    <span class="text-primary small pt-1 fw-bold">My Reviews</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- messages --}}
            {{-- <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="vendors" class="card-body">
                        <div class="row">
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-comments fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">Messages</h3>
                                    <span class="text-primary small pt-1 fw-bold">My Messages</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div> --}}
            {{-- profile --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="{{route('user.showProfile')}}" class="card-body">
                        <div class="row">
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">My Profile</h3>
                                    <span class="text-primary small pt-1 fw-bold">View Profile</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- edit profile --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="{{route('user.editProfile')}}" class="card-body">
                        <div class="row">
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">Edit Profile</h3>
                                    <span class="text-primary small pt-1 fw-bold">Update Profile</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- password --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="{{route('user.editPassword')}}" class="card-body">
                        <div class="row">
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">Password</h3>
                                    <span class="text-primary small pt-1 fw-bold">Reset Password</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- logs --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="{{route('user.logs')}}" class="card-body">
                        <div class="row">
                            <div class="col-4 py-2 text-center">
                                <span class="fa-stack fa-2x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <div class="col-8">
                                <div class="ps-3">
                                    <h3 class="font-weight-bold mb-1">Logs</h3>
                                    <span class="text-primary small pt-1 fw-bold">User Logs</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

          </div>

      </div>
  </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

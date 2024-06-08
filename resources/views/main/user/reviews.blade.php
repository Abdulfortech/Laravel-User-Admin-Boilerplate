<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | My Review')
@php( $page = 'Reviews')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4 col-12">
    <div class="row">
        <div class="container col-md-8 p-1 mx-auto">
            <div class="section-head my-5 text-center">
                <h1 class="mb-5 font-weight-bold">
                  <span>My Reviews</span>
                </h1>
            </div>
            @foreach ($reviews as $review)
                <!-- single review -->
                <div class="card mt-3">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4><i class="fa fa-user-circle" style="font-size: 28px;"></i> {{$review->name}}</h4>
                            </div>
                        </div>
                        <p class="text-justify">{{$review->review}}</p>
                        <h6 class="text-left"><i class="fa fa-calendar"></i> {{substr($review->created_at, 0, 10)}}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

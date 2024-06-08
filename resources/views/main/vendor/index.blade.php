<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | My Vendors')
@php( $page = 'vendors')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <div class="col-lg-12 px-0">
          <!-- section head -->
          <div class="section-head my-5 text-center">
              <h1 class="mb-5 font-weight-bold">
              <span>My Vendors</span>
              </h1>
          </div>
        <div class="row ">
            @foreach($vendors as $vendor)
            {{-- card --}}
            <div class="col-md-4 col-12 mb-2">
                <div class="card info-card sales-card rounded">
                    <a href="{{route('vendor.view',[$vendor->id])}}" class="card-body">
                        <div class="row">
                            <div class="col-3 py-2 text-center">
                                <center>
                                    @if($vendor->logo)
                                    <img src="{{ asset('storage/' . $vendor->logo) }}" width="70" height="70" alt="" class="rounded-circle">
                                    @else
                                    <img src="{{ asset('app/assets/img/logo.png') }}" width="70" height="70" alt="" class="rounded-circle">
                                    @endif
                                </center>
                            </div>
                            {{-- @php($link = asset('storage/' . $vendor->banner))
                            @dd($link); --}}
                            <div class="col-9">
                                <div class="ps-3">
                                    <h5 class="font-weight-bold mb-1">{{ $vendor->name}}</h3>
                                    <span class="text-primary small pt-1 fw-bold">{{$vendor->category}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

      </div>
  </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

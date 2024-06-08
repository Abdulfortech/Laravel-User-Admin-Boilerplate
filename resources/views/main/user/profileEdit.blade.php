<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Edit Profile')
@php( $page = 'home')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <div class="col-lg-12 px-0">
          <!-- section head -->
          <div class="section-head my-5 text-center">
              <h1 class="mb-5 font-weight-bold">
              <span>Edit Profile</span>
              </h1>
          </div>
        <div class="row ">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <i class="fa fa-user-circle" style="font-size:100px;"></i>
                        </center>
                        <form action="{{route('user.profile')}}" method="POST" class="text-left">
                            @csrf
                            <input type="text" name="userID" value="{{auth()->user()->id}}" hidden>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="firstName" value="{{auth()->user()->firstName}}" required>
                                    @error('firstName')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control"  name="lastName" value="{{auth()->user()->lastName}}" required>
                                    @error('lastName')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Date of Birth</label>
                                    <input type="date" class="form-control"  name="dob" value="{{auth()->user()->dob}}" required>
                                    @error('dob')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option>{{auth()->user()->gender}}</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control"  name="phone" value="{{auth()->user()->phone}}" readonly>
                                    @error('phone')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-7">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control"  name="email" value="{{auth()->user()->email}}" readonly>
                                    @error('email')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">State</label>
                                    <select class="form-control" name="state" required>
                                        <option>{{auth()->user()->state}}</option>
                                        @include('components.state-list')
                                    </select>
                                    @error('state')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Local Government</label>
                                    <input type="text" class="form-control"  name="lga" value="{{auth()->user()->lga}}" required>
                                    @error('lga')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control"  name="address" value="{{auth()->user()->address}}" required>
                                    @error('address')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Type of Identity</label>
                                    <input type="text" class="form-control" name="idType" value="NIN" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Identity Number</label>
                                    <input type="text" class="form-control"  name="idNumber" value="{{auth()->user()->idNumber}}" required>
                                    @error('idNumber')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <center>
                                <input type="submit" class="btn btn-primary" value="Update">
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
  </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

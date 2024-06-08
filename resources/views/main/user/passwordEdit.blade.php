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
              <span>Reset Password</span>
              </h1>
          </div>
        <div class="row ">
            <div class="col-lg-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <i class="fa fa-user-circle" style="font-size:100px;"></i>
                        </center>
                        <form action="{{route('user.password')}}" method="POST" class="text-left">
                            @csrf
                            <input type="text" name="userID" value="{{auth()->user()->id}}" hidden>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="">Current Password</label>
                                    <input type="password" class="form-control" name="oldPassword" required>
                                    @error('oldPassword')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control"  name="password" required>
                                    @error('password')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="">Confirm New Password</label>
                                    <input type="password" class="form-control"  name="password_confirmation" required>
                                    @error('password_confirmation')
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

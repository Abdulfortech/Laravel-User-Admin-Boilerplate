<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Profile')
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
              <span>My Profile</span>
              </h1>
          </div>
          <div class="row ">
            <div class="col-lg-8 mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <center>
                            <i class="fa fa-user-circle" style="font-size: 80px;"></i>
                        </center>
                        <div class="row">
                            <div class="col-md-12"><h6 class="text-left text-dark font-weight-bold">Personal Information</h6></div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>First Name : </b> <span id="firstName">{{auth()->user()->firstName}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Last Name : </b> <span id="firstName">{{auth()->user()->lastName}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Date of Birth : </b> <span id="firstName">{{auth()->user()->dob}}</span>
                                    </li>
                                </ol>
                            </div><div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Gender : </b> <span id="firstName">{{auth()->user()->gender}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-12"><h6 class="text-left text-dark font-weight-bold">Contact Information</h6></div>
                            <div class="col-md-5">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Phone : </b> <span id="firstName">{{auth()->user()->phone}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-7">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Email : </b> <span id="firstName">{{auth()->user()->email}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>State : </b> <span id="firstName">{{auth()->user()->state}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>LGA : </b> <span id="firstName">{{auth()->user()->lga}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Address : </b> <span id="firstName">{{auth()->user()->address}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-12"><h6 class="text-left text-dark font-weight-bold">Identity Information</h6></div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Type : </b> <span id="firstName">NIN</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Identity Number : </b> <span id="firstName">{{auth()->user()->idNumber}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-12"><h6 class="text-left text-dark font-weight-bold">Other  Details</h6></div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>User Type : </b> <span id="firstName">{{auth()->user()->type}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <b>Status : </b> <span id="firstName">{{auth()->user()->status}}</span>
                                    </li>
                                </ol>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <a href="{{route('user.editProfile')}}" class="btn btn-primary">Edit Profile</a>
                                </center>
                            </div>

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

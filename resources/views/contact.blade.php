<!DOCTYPE html>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NBMJ3RLJKQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-NBMJ3RLJKQ');
    </script>
</head>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Contact Us')
@php( $page = 'Contact')
@section('contents')
@include('components.navbar')
<style>
</style>
  <!-- wrapper start -->
  <div class="wrapper pt-5 mt-5">
    <center>
        <div class="container mt-3 bg-white col-md-11">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Contact Us</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body text-center">
                                    <span class="badge badge-primary badge-pill p-3">
                                        <i class="fa fa-phone" style="font-size: 50px"></i>
                                    </span><br>
                                    <span>+234 (0) 707 742 9320</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body text-center">
                                    <span class="badge badge-primary badge-pill p-3">
                                        <i class="fa fa-envelope" style="font-size: 50px"></i>
                                    </span><br>
                                    <span>onestopsolution739@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body text-center">
                                    <span class="badge badge-primary badge-pill p-3">
                                        <i class="fa fa-facebook-square" style="font-size: 50px"></i>
                                    </span><br>
                                    <span>OneStop Solution</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div class="card-body text-center">
                                    <span class="badge badge-primary badge-pill p-3">
                                        <i class="fa fa-instagram" style="font-size: 50px"></i>
                                    </span><br>
                                    <span>onestopsolution739</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-2">
                                <div class="card-body text-center">
                                    <span class="badge badge-primary badge-pill p-3">
                                        <i class="fa fa-map-marker" style="font-size: 40px"></i>
                                    </span><br>
                                    <span>No. 12 Al-Wabel Plaza, Kofar Kudu, Emir's Palace Road, Kano.</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{route('message.store')}}" method="post">
                      @csrf
                        <div class="card-body p-3 text-center">
                            <h4>Send us a Message</h4>
                            <div class="form-group text-left">
                                <label for="">Name</label>
                                <input class="form-control" placeholder="Name" name="name" value="{{Auth::check()? auth()->user()->firstName." ".auth()->user()->lastName :''}}" type="text" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="">Phone Number</label>
                                <input class="form-control" placeholder="Phone Number" name="contact" value="{{Auth::check()? auth()->user()->phone :''}}" type="text" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="">Body</label>
                                <textarea class="form-control" name="body" rows="7" required></textarea>
                            </div>
                            <center><button type="submit" class="btn btn-primary">Submit</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
  </div>
  <!-- Wrapper End-->


@include('components.footer')

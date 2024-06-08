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
@section('title', 'OneStop | Order Complete')
@php( $page = 'Order')
@section('contents')
@include('components.navbar')
<style>
</style>
  <!-- wrapper start -->
  <div class="wrapper pt-5 mt-5">
    <center>
        <div class="container mt-5 bg-white col-md-11">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <span class="badge badge-success badge-pill p-2">
                                <i class="fa fa-check" style="font-size: 100px"></i>
                            </span>
                            <h3>You successfully place order</h3>
                            <h5 class="mt-1">OrderID : {{$orderCode}}</h5>
                            <p>To complete the order contact us via the following : </p>
                            <a href="tel:+23407077429320" class="btn btn-primary"><i class="fa fa-phone"></i> Call</a>
                            <a href="https://wa.me/+23407077429320/?text=Hi, my order is {{$orderCode}}" class="btn btn-primary"><i class="fa fa-whatsapp"></i> WhatsApp</a>
                            <br><br><br>
                            <a href="{{route('allProducts')}}">Back to Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </center>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

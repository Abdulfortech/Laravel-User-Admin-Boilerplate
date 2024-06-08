<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | My Order')
@php( $page = 'home')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container p-1">
        <div class="section-head my-5 text-center">
            <h1 class="mb-5 font-weight-bold">
              <span>My Orders</span>
            </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive bg-shite mt-4">
                    <div class="col-12"><h4>My Orders</h4></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>ID</td>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Subtotal</td>
                                <td>Delivery</td>
                                <td>Total</td>
                                <td>Status</td>
                                <td>Created At</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$order->orderCode}}</td>
                                <td>{{substr($order->product->title, 0, 20)}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>&#8358; {{number_format($order->subtotal, 2, '.', ',')}}</td>
                                <td>&#8358; {{number_format($order->delivery, 2, '.', ',')}}</td>
                                <td>&#8358; {{number_format($order->total, 2, '.', ',')}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    {{substr($order->created_at, 0,10)}}
                                </td>
                            </tr>
                            @php($count++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

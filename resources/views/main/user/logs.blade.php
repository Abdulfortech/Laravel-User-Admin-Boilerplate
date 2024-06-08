<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | User Logs')
@php( $page = 'home')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container p-3">
        <div class="section-head my-5 text-center">
            <h1 class="mb-5 font-weight-bold">
              <span>User Logs</span>
            </h1>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive bg-shite mt-4">
                    <div class="col-12"><h4>All Logs</h4></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Username</td>
                                <td>Status</td>
                                <td>Created At</td>
                                <td>Updated At</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach($logs as $log)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$log->username}}</td>
                                <td><span class="badge bg-info text-white">{{$log->status}}</span></td>
                                <td>
                                    {{$log->created_at}}
                                </td>
                                <td>
                                    {{$log->updated_at}}
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

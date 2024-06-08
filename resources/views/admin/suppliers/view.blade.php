<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'Suppliers')
@php( $page = 'Suppliers')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @include('components.admin.header')
        <div class="row">
            <div class="col-md-8 mx-auto">
              <div class="card mb-4">
                <div class="card-header text-center pb-0">
                    <i class="far fa-user-circle" style="font-size: 80px"></i>
                  <h4 class="text-center">View Supplier</h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Name : </b> <span id="firstName">{{$supplier->name}}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Type : </b> <span id="middleName">{{$supplier->type}}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Phone Number 1 : </b> <span id="middleName">{{$supplier->phone1}}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Phone Number 2 : </b> <span id="middleName">{{$supplier->phone2}}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Address : </b> <span id="middleName">{{$supplier->address}}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Description : </b> <span id="middleName">{{$supplier->description}}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Status : </b> <span id="middleName">{{$supplier->status}}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <b>Added On : </b> <span id="middleName">{{$supplier->created_at}}</span>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <center>
                        <a href="{{route('admin.suppliers.edit',[$supplier->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        @if($supplier->status == 'Active')
                            <a href="{{route('admin.suppliers.deactivate',[$supplier->id])}}" class="btn btn-warning"><i class="fa fa-trash"></i> Deactivate</a>
                        @else
                            <a href="{{route('admin.suppliers.activate',[$supplier->id])}}" class="btn btn-success"><i class="fa fa-trash"></i> Activate</a>
                        @endif
                        <a href="{{route('admin.suppliers.delete',[$supplier->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    </center>
                </div>
              </div>
            </div>
          </div>
    </div>
  @include('components.admin.footer')
    </div>
  </main>

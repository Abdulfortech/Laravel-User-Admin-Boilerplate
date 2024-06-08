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
      <div class="container text-center"><h2 class="text-white">Suppliers</h2></div>
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6 class="float-start">Suppliers</h6>
                <a href="{{route('admin.suppliers.add')}}" class="float-end btn btn-primary btn-sm" class="float-end btn btn-primary"><i class="fa fa-plus"></i> Add </a>
              </div>
              <div class="card-body px-2 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="datatable">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary font-weight-bolder">S/N</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Name</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Phone Number</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Status</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php($count = 1)
                        @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->phone1}}</td>
                            <td>{{$supplier->status}}</td>
                            <td>
                              <a href="{{route('admin.suppliers.view',[$supplier->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                              <a href="{{route('admin.suppliers.edit',[$supplier->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
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
    </div>
  @include('components.admin.footer')
    </div>
  </main>

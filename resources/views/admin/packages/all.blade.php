@extends('layout.admin.appLayout')
@section('title', 'Packages')
@php( $page = 'packages')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="container text-center"><h2 class="text-white">Packages</h2></div>
      
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class="float-start">Packages</h6>
              <a href="{{route('admin.packages.add')}}" class="float-end btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add</a>
              {{-- <a href="{{route('products.printAll')}}" class="float-end btn btn-primary btn-sm mx-2"> <i class="fa fa-print"></i> Print </a> --}}
            </div>
            <div class="card-body px-2 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="datatable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary font-weight-bolder">S/N</th>
                      <th class="text-uppercase text-secondary font-weight-bolder">Title</th>
                      <th class="text-uppercase text-secondary font-weight-bolder">Price</th>
                      {{-- <th class="text-uppercase text-secondary font-weight-bolder">Stock</th> --}}
                      <th class="text-uppercase text-secondary font-weight-bolder">Status</th>
                      <th class="text-uppercase text-secondary font-weight-bolder">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php($count = 1)
                      @foreach($packages as $package)
                      <tr>
                          <td>{{$count}}</td>
                          <td>{{$package->title}}</td>
                          <td>&#8358; {{number_format($package->price)}}</td>
                          <td>{{$package->status}}</td>
                          <td>
                            <a href="{{route('admin.packages.view',[$package->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.packages.edit',[$package->id])}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <a href="{{route('admin.packages.delete',[$package->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
      @include('components.admin.footer')
    </div>
  </main>
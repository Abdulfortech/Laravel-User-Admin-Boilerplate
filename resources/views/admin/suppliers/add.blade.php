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
                  <h4 class="text-center">Add Supplier</h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <form id="addClientForm" action="{{route('admin.suppliers.add')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Name <small class="text-danger">*</small></label>
                                    <input class="form-control" name="name" id="addClientName" type="text" required>
                                    @error('name')
                                    <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Type <small class="text-danger">*</small></label>
                                    <select class="form-control" name="type" id="addClientType" required>
                                        <option selected value="">Choose..</option>
                                        <option>Individual</option>
                                        <option>Company</option>
                                    </select>
                                    @error('type')
                                    <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Phone Number <small class="text-danger">*</small></label>
                                    <input class="form-control" name="phone1" id="addClientName" type="text" required>
                                    @error('phone1')
                                    <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Phone Number 2</label>
                                    <input class="form-control" name="phone2" id="addClientName" type="text">
                                    @error('phone2')
                                    <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Address <small class="text-danger">*</small></label>
                                    <input class="form-control" name="address" id="addClientName" type="text" required>
                                    @error('address')
                                    <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Description</label>
                                    <textarea class="form-control" name="description"></textarea>
                                    @error('description')
                                    <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" id="addClientButton">Submit</button>
                        </center>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
  @include('components.admin.footer')
    </div>
  </main>

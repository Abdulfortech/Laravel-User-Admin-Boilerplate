<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'Company Media Files')
@php( $page = 'Components')
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
              <div class="card">
                <div class="card-header pb-0">
                  <div class="text-center ">
                    <h4 class="mb-0 fw-bold">Company Logo</h4>
                    <!-- <button class="btn btn-primary btn-sm ms-auto">Company Profile</button> -->
                  </div>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="{{route('admin.updateLogo')}}" method="POST">
                    @csrf
                    <center>
                        @if(isset(auth()->user()->business->logo))
                            <img src="{{ asset('storage/' . auth()->user()->business->logo) }}" class="rounded-circle" alt="employee-image" width="100" height="100">
                        @else
                            <i class="fa fa-bank" style="font-size: 80px"></i>
                        @endif
                    </center>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Upload the new logo</label>
                              <input type="file" name="image" class="form-control" required>
                              @error('motto')
                                  <span class="text-danger small">{{ $message}}</span>
                              @enderror
                            </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="#"></label>
                    </div>
                    <center>
                      <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                    </center>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-8 mx-auto mt-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="text-center ">
                    <h4 class="mb-0 fw-bold">Company Banner</h4>
                    <!-- <button class="btn btn-primary btn-sm ms-auto">Company Profile</button> -->
                  </div>
                </div>
                <div class="card-body">
                  <form enctype="multipart/form-data" action="{{route('admin.updateBanner')}}" method="POST">
                    @csrf
                    <center>
                        @if(isset(auth()->user()->business->banner))
                            <img src="{{ asset('storage/' . auth()->user()->business->banner) }}" class="rounded" alt="employee-image" width="400" height="200">
                        @else
                            <i class="fa fa-bank" style="font-size: 80px"></i>
                        @endif
                    </center>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Upload the new Banner</label>
                              <input type="file" name="image" class="form-control" required>
                              @error('motto')
                                  <span class="text-danger small">{{ $message}}</span>
                              @enderror
                            </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="#"></label>
                    </div>
                    <center>
                      <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
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

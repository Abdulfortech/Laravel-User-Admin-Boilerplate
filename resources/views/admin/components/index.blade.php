<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'Components')
@php( $page = 'components')
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
            <!--card -->
            <div class="col-md-4 mb-4">
              <a class="card" href="{{route('admin.company')}}" style="text-decoration: none;">
                <div class="card-body py-4 p-3 d-flex justify-content-center align-items-center" style="height:150px">
                  <div class="col-12 row">
                    <div class="col-4 justify-content-center align-items-center text-center">
                      <i class="fa fa-bank text-primary" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                    <div class="col-8">
                      <div class="numbers">
                        <h6 class="font-weight-bolder">
                          Company Profile
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <!--card -->
            <div class="col-md-4 mb-4">
              <a class="card" href="{{route('admin.companyMedia')}}" style="text-decoration: none;">
                <div class="card-body py-4 p-3 d-flex justify-content-center align-items-center" style="height:150px">
                  <div class="col-12 row">
                    <div class="col-4 justify-content-center align-items-center text-center">
                      <i class="fa fa-sitemap text-primary" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                    <div class="col-8">
                      <div class="numbers">
                        <h5 class="font-weight-bolder">
                          Company Media
                        </h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <!--card -->
            <div class="col-md-4 mb-4">
              <a class="card" href="{{route('admin.categories')}}" style="text-decoration: none;">
                <div class="card-body py-4 p-3 d-flex justify-content-center align-items-center" style="height:150px">
                  <div class="col-12 row">
                    <div class="col-4 justify-content-center align-items-center text-center">
                      <i class="fa fa-sitemap text-primary" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                    <div class="col-8">
                      <div class="numbers">
                        <h6 class="font-weight-bolder">
                          Categories
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <!--card -->
            <div class="col-md-4 mb-4">
              <a class="card" href="{{route('admin.subcategories')}}" style="text-decoration: none;">
                <div class="card-body py-4 p-3 d-flex justify-content-center align-items-center" style="height:150px">
                  <div class="col-12 row">
                    <div class="col-4 justify-content-center align-items-center text-center">
                      <i class="fa fa-sitemap text-primary" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                    <div class="col-8">
                      <div class="numbers">
                        <h6 class="font-weight-bolder">
                          Sub Categories
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <!--card -->
            <div class="col-md-4 mb-4">
              <a class="card" href="{{route('admin.brands')}}" style="text-decoration: none;">
                <div class="card-body py-4 p-3 d-flex justify-content-center align-items-center" style="height:150px">
                  <div class="col-12 row">
                    <div class="col-4 justify-content-center align-items-center text-center">
                      <i class="fa fa-sitemap text-primary" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                    <div class="col-8">
                      <div class="numbers">
                        <h6 class="font-weight-bolder">
                          Brands
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <!--card -->
            <div class="col-md-4 mb-4">
              <a class="card" href="{{route('admin.slideshows')}}" style="text-decoration: none;">
                <div class="card-body py-4 p-3 d-flex justify-content-center align-items-center" style="height:150px">
                  <div class="col-12 row">
                    <div class="col-4 justify-content-center align-items-center text-center">
                      <i class="fa fa-sitemap text-primary" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                    <div class="col-8">
                      <div class="numbers">
                        <h6 class="font-weight-bolder">
                          Slide Shows
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        </div>
  </div>
  @include('components.admin.footer')
    </div>
  </main>

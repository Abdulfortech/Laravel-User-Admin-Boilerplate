<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Edit Pictures')
@php( $page = 'vendor')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <div class="col-lg-12 px-0">
        <div class="section-head my-5 text-center">
            <h1 class="mb-5 font-weight-bold">
              <span>Edit Logo & Banner</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card info-card sales-card">
                    <div class="card-body text-center align-items-center">
                        <form class="needs-validation text-left" enctype="multipart/form-data" action="{{route('vendor.updateLogo', [$vendor->id])}}" method="POST" novalidate>
                            @csrf
                            <div class="form-group align-items-start row">
                                <div class="col-md-6 mx-auto mb-2">
                                    <center>
                                        <h4>Change Logo</h4>
                                        <div class="logo-preview mt-3 border" id="logoPreview"></div>
                                    </center>
                                    <label for="logo">Logo<span class="text-danger font-weight-bold">*</span></label>
                                    <input id="logo" type="file" class="form-control" name="logo" accept="image/*" onchange="displayLogo(this)" required>
                                    @error('logo')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>

                <div class="card info-card sales-card">
                    <div class="card-body text-center align-items-center">
                        <form class="needs-validation text-left" enctype="multipart/form-data" action="{{route('vendor.updateBanner', [$vendor->id])}}" method="POST" novalidate>
                            @csrf
                            <div class="form-group align-items-start row">
                                <div class="col-md-6 mx-auto mb-2">
                                    <center>
                                        <h4>Change Banner</h4>
                                        <div class="banner-preview mt-3 border" id="bannerPreview"></div>
                                    </center>
                                    <label for="banner">Banner (300x1200) <span class="text-danger font-weight-bold">*</span></label>
                                    <input id="banner" type="file" class="form-control" name="banner" accept="image/*" onchange="displayBanner(this)" required>
                                    @error('banner')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      </div>
  </div>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

@push('script')

  <!-- stepper -->
  <script src="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/js/bs-stepper.min.js"></script>
  <script src="{{ asset('app/assets/js/bs-stepper.js') }}"></script>
  <script>
    function displayBanner(input) {
        const preview = document.getElementById('bannerPreview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function () {
                preview.style.backgroundImage = `url(${reader.result})`;
            });

            reader.readAsDataURL(file);
        } else {
            preview.style.backgroundImage = 'none';
        }
    }

    function displayLogo(input) {
        const preview = document.getElementById('logoPreview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function () {
                preview.style.backgroundImage = `url(${reader.result})`;
            });

            reader.readAsDataURL(file);
        } else {
            preview.style.backgroundImage = 'none';
        }
    }
  </script>
@endpush

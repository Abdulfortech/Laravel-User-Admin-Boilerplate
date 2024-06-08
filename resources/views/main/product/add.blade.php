<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Add Vendor')
@php( $page = 'vendor')
@section('contents')
@include('components.navbar')
<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.1/dist/css/select2.min.css" rel="stylesheet">
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <div class="col-lg-12 px-0">
        <div class="section-head my-5 text-center">
            <h1 class="mb-5 font-weight-bold">
              <span>New Product</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" class="">
                            @csrf
                            <div class="form-group">
                                <label for="">Select Vendor</label>
                                <select class="form-control" name="vendorID" required>
                                    <option value="">Choose</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                    @endforeach
                                </select>
                                @error('vendorID')
                                    <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" class="form-control" placeholder="Title" type="text" required>
                                @error('title')
                                    <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Select Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">Choose</option>
                                        <option>Textile</option>
                                        <option>Fashion</option>
                                        <option>Electronics</option>
                                        <option>Kitchenware</option>
                                        <option>Foods</option>
                                        <option>Furnitures</option>
                                    </select>
                                    @error('category')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Market From</label>
                                    <select name="market" class="form-control" required>
                                        <option value="">Choose</option>
                                        <option>Kwari Market</option>
                                        <option>Wambai Market</option>
                                        <option>Sabon Gari Market</option>
                                        <option>None</option>
                                    </select>
                                    @error('market')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Brand</label>
                                    <input type="text" class="form-control" name="brand">
                                    @error('brand')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Select Sub Category</label>
                                    {{-- <select class="form-select form-control" id="categoryselect" name="subcategory[]" multiple data-placeholder="Choose Sub Category" required> --}}
                                    <select class="form-control" name="subcategory" required>
                                        <option>Atampa</option>
                                        <option>Shadda</option>
                                        <option>Lace</option>
                                        <option>Jeans</option>
                                    </select>
                                    @error('subcategory')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="">Price</label>
                                </div>
                                <div class="col-md-12">
                                    <input name="price" type="number" class="form-control" placeholder="Price" required>
                                </div>
                                @error('price')
                                    <span class="text-danger small">{{ $message}}</span>
                                @enderror
                                {{-- <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Discounted Price">
                                </div> --}}
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="">Cover Picture</label>
                                    <input name="picture" class="form-control" placeholder="Quantity" type="file" required>
                                </div>
                                @error('picture')
                                    <span class="text-danger small">{{ $message}}</span>
                                @enderror
                                {{-- <div class="col-6">
                                    <label for="">Other Pictures</label>
                                    <input class="form-control" placeholder="Quantity" type="file">
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <textarea name="short_desc" class="form-control" placeholder="short description" rows="3" maxlength="250" required></textarea>
                                @error('short_desc')
                                    <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Long Description</label>
                                <textarea name="long_desc" class="form-control" placeholder="Long description" rows="7" maxlength="1000" required></textarea>
                                @error('long_desc')
                                    <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                            <center>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </center>
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
    $( '#categoryselect' ).select2( {
        theme: "bootstrap-5",
        // width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    });
  </script>
@endpush

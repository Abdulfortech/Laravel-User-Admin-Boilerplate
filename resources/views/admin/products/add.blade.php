<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'Products')
@php( $page = 'Products')
@section('contents')
<style>


.image-preview {
    width: 150px;
    height: 150px;
    border: 2px solid #ddd;
    background-size: cover;
    background-position: center;
}
</style>
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @include('components.admin.header')
      <div class="row">
        <div class="col-md-9 mx-auto">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h4 class="text-center">Add Product</h4>
            </div>
            <div class="card-body pt-0 pb-2">
                <form id="addProductForm" enctype="multipart/form-data" action="{{route('admin.products.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Name</label>
                                <input class="form-control" name="title" id="addProductName" type="text" required>
                                @error('title')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Brand</label>
                                <select class="form-control" name="brand" id="addProductbrand">
                                    <option selected value="">Choose..</option>
                                    @foreach($brands as $brand)
                                        <option>{{$brand->title}}</option>
                                    @endforeach
                                    <option>None</option>
                                </select>
                                @error('brand')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Product #ID</label>
                                <input class="form-control" type="text" name="productCode" value="{{$code}}" readonly>
                                @error('productCode')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Category</label>
                                <select class="form-control" name="category" id="addProductCategory" required>
                                    <option selected value="">Choose..</option>
                                    @foreach($categories as $category)
                                        <option>{{$category->title}}</option>
                                    @endforeach
                                    <option>None</option>
                                </select>
                                @error('category')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Sub Category</label>
                                <select class="form-control" name="subcategory" id="addProductDepartment" required>
                                    <option selected value="">Choose..</option>
                                    @foreach($subcategories as $subcategory)
                                        <option>{{$subcategory->title}}</option>
                                    @endforeach
                                    <option>None</option>
                                </select>
                                @error('subcategory')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Body Shape</label>
                                <select class="form-control" name="body" id="addProductDepartment" required>
                                    <option selected value="">Choose..</option>
                                    <option>Men</option>
                                    <option>Women</option>
                                    <option>Kids</option>
                                    <option>Unisex</option>
                                    <option>None</option>
                                </select>
                                @error('body')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Normal Price(&#8358;)</label>
                                <input class="form-control" type="number" name="normal_price" id="addProductPrice" required>
                                @error('normal_price')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Actual Price(&#8358;)</label>
                                <input class="form-control" type="number" name="price" id="addProductPrice" required>
                                @error('price')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Cover Picture</label>
                                <input class="form-control" type="file" name="image1" id="addProductPicture" required>
                                @error('image1')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">2nd Picture(Optional)</label>
                                <input class="form-control" type="file" name="image2" id="addProductPicture">
                                @error('image2')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">3rd Picture(Optional)</label>
                                <input class="form-control" type="file" name="image3" id="addProductPicture">
                                @error('image3')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Short Description(250)</label>
                                <textarea class="form-control" name="short_desc" id="addProductStock" maxlength="250" required></textarea>
                                @error('short_desc')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-md-4 offset-md-4">
                            <div class="card p-0">
                                <div class="card-body p-0 text-center align-items-center">
                                    <center>
                                        <label for="image1" class="d-block">
                                            <input type="file" id="image1" name="image1" class="form-control-file d-none" accept="image/*" onchange="displayImage(this)" required>
                                            <span class="image-label">Cover Picture</span>
                                            <div class="image-preview mt-3" id="imagePreview1"></div>
                                        </label>
                                    </center>
                                    @error('image1')
                                    <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary" id="addProductButton">Submit</button>
                    </center>
                </form>
            </div>
          </div>
        </div>
      </div>

      @include('components.admin.footer')
    </div>
  </main>

  @push('script')
  <script>
    function displayImage(input) {
        const preview = document.getElementById('imagePreview1');
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

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
        <div class="col-md-9 mx-auto">
          <div class="card mb-4">
            <div class="card-header text-center pb-0">
              <i class="fa fa-briefcase" style="font-size: 80px"></i>
              <h4 class="text-center">Edit Package</h4>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                <form id="addProductForm" enctype="multipart/form-data" action="{{route('admin.packages.update')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$package->id}}" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Title</label>
                                <input class="form-control" name="title" value="{{$package->title}}" type="text" required>
                                @error('title')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Price(&#8358;)</label>
                                <input class="form-control" type="number" name="price" value="{{$package->price}}" required>
                                @error('price')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Description</label>
                                <textarea class="form-control" name="description" id="addProductStock">{{$package->description}}</textarea>
                                @error('description')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                          </div>
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
<!DOCTYPE html>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NBMJ3RLJKQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-NBMJ3RLJKQ');
    </script>
</head>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">

@extends('layout.main.userLayout')
@section('title', 'OneStop')
@php( $page = 'home')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper">
    <div class="section">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
            <div class="carousel-inner">
                @if($active)
                <div class="carousel-item active">
                    <img src="{{ asset('storage/'. $active->picture) }}" class="" alt="...">
                </div>
                @else
                <div class="carousel-item active">
                    <img src="{{ asset('img/ss.jpeg') }}" class="d-block w-100" alt="...">
                </div>
                @endif
                @foreach($slideshows as $slideshow)
                <div class="carousel-item">
                    <img src="{{ asset('storage/'. $slideshow->picture) }}" class="d-block w-100" alt="OneStopShop">
                </div>
                @endforeach
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button> --}}
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- main body -->
    <main>
      <center>
        <div class="col-md-12 col-12 mt-1 categories-container">
          {{-- category containers --}}
          {{-- <div class="row align-items-md-stretch">
            <div class="col-md-6 mb-2">
              <div class="other-container p-5 text-white">
                  <h2 class="text-white font-weight-bolder">All Products</h2>
                  <p class="font-weight-bold">Browse our collections of hundredths of products ranging from bags, to watches and jewellery.</p>
                  <a href="{{route('allProducts')}}" class="btn btn-outline-white text-white font-weight-bold" type="button">Browse</a>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="shoes-container p-5 text-white">
                  <h2 class="text-white font-weight-bolder">Bags</h2>
                  <p class="font-weight-bold">Get all kinds of stylish and qualitative bags, ranging from hand bags, purse, school bag and many more. </p>
                  <a href="{{route('allProducts')}}" class="btn btn-outline-white text-white font-weight-bold" type="button">Browse</a>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="watches-container p-5 text-white">
                <h2 class="text-white font-weight-bolder">Watches</h2>
                <p class="font-weight-bold">The best place to buy your elegant and qualitative watches for both men and women.place the order now.</p>
                <a href="{{route('allProducts')}}" class="btn btn-outline-white text-white font-weight-bold" type="button">Browse</a>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="jewellery-container p-5 text-white">
                  <h2 class="text-white font-weight-bolder">Jewelleries</h2>
                  <p class="font-weight-bold">Get all kinds of stylish and qualitative bags, ranging from hand bags, purse, school bag and many more. </p>
                  <a href="{{route('allProducts')}}" class="btn btn-outline-white text-white font-weight-bold" type="button">Browse</a>
              </div>
            </div>

          </div> --}}

          {{-- latest products --}}
          <div class="row">
              <div class="col-12 my-5">
                <h3 class="text-primary text-center font-weight-bold mb-2">Latest Products</h3>
              </div>

              @foreach ($latest as $product)
                <!-- product -->
                <div class="col-xl-2 col-md-2 col-6">
                    <a href="{{route('product.view',[$product->id])}}" class="card product-card border shadow-sm">
                      <img src="{{ $product->image1 }}" class="card-img-top" alt="{{$product->title}}">
                        <div class="card-body text-left p-2">
                            <span class="badge bg-info font-weight-bold text-white mb-1">{{$product->category}}</span>
                            <span class="badge bg-primary font-weight-bolder text-white">&#8358; {{number_format($product->price, 2, '.', ',')}}</span>
                            <h6 class="card-title">{{substr($product->title, 0, 60)}}...</h6>
                        </div>
                    </a>
                </div>
              @endforeach

              <div class="col-12 mt-3">
                <a href="{{route('latest')}}" class="btn btn-primary">View More</a>
              </div>
          </div>

          <hr>

          {{-- featured products --}}
          {{-- <div class="row">
            <div class="col-12 my-5">
              <h3 class="text-primary text-center font-weight-bold mb-2">Featured Products</h3>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="{{route('product.view', [1])}}" class="card product-card border shadow-sm">
                    <img src="{{ asset('img/bags (1).jpg') }}" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 12,000</span>
                        <h6 class="card-title">hdshsa dsjcdscndsc scdsc dsc dhehdssc dnvcd csvcndss dnjdsds ns dsc cshdsf dsjvdsvnsv </h6>
                    </div>
                </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="{{route('product.view', [1])}}" class="card product-card border shadow-sm">
                    <img src="{{ asset('img/bags (1).jpg') }}" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 12,000</span>
                        <h6 class="card-title">hdshsa dsjcdscndsc scdsc dsc dhehdssc dnvcd csvcndss dnjdsds ns dsc cshdsf dsjvdsvnsv </h6>
                    </div>
                </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="{{route('product.view', [1])}}" class="card product-card border shadow-sm">
                    <img src="{{ asset('img/bags (1).jpg') }}" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 12,000</span>
                        <h6 class="card-title">hdshsa dsjcdscndsc scdsc dsc dhehdssc dnvcd csvcndss dnjdsds ns dsc cshdsf dsjvdsvnsv </h6>
                    </div>
                </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="{{route('product.view', [1])}}" class="card product-card border shadow-sm">
                    <img src="{{ asset('img/bags (1).jpg') }}" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 12,000</span>
                        <h6 class="card-title">hdshsa dsjcdscndsc scdsc dsc dhehdssc dnvcd csvcndss dnjdsds ns dsc cshdsf dsjvdsvnsv </h6>
                    </div>
                </a>
            </div>

            <div class="col-12 mt-3">
              <a href="#" class="btn btn-primary">View More</a>
            </div>
          </div>

          <hr> --}}

          {{-- bags products --}}
          <div class="row">
            <div class="col-12 my-5">
              <h3 class="text-primary text-center font-weight-bold mb-2">Bags</h3>
            </div>
            @foreach ($bags as $product)
              <!-- product -->
                <div class="col-xl-2 col-md-2 col-6">
                    <a href="{{route('product.view',[$product->id])}}" class="card product-card border shadow-sm">
                      <img src="{{ $product->image1 }}" class="card-img-top" alt="{{$product->title}}">
                        <div class="card-body text-left p-2">
                          <span class="badge bg-info font-weight-bold text-white mb-1">{{$product->category}}</span>
                          <span class="badge bg-primary font-weight-bolder text-white">&#8358; {{number_format($product->price, 2, '.', ',')}}</span>
                          <h6 class="card-title">{{substr($product->title, 0, 60)}}...</h6>
                      </div>
                  </a>
              </div>
            @endforeach
            <div class="col-12 mt-3">
              <a href="{{route('category', ['Bags'])}}" class="btn btn-primary">View More</a>
            </div>
          </div>

          <hr>

          {{-- watches products --}}
          <div class="row">
            <div class="col-12 my-5">
              <h3 class="text-primary text-center font-weight-bold mb-2">Watches</h3>
            </div>
            @foreach ($watches as $product)
              <!-- product -->
                <div class="col-xl-2 col-md-2 col-6">
                    <a href="{{route('product.view',[$product->id])}}" class="card product-card border shadow-sm">
                      <img src="{{ $product->image1 }}" class="card-img-top" alt="{{$product->title}}">
                        <div class="card-body text-left p-2">
                          <span class="badge bg-info font-weight-bold text-white mb-1">{{$product->category}}</span>
                          <span class="badge bg-primary font-weight-bolder text-white">&#8358; {{number_format($product->price, 2, '.', ',')}}</span>
                          <h6 class="card-title">{{substr($product->title, 0, 60)}}...</h6>
                      </div>
                  </a>
              </div>
            @endforeach
            <div class="col-12 mt-3">
              <a href="{{route('category', ['Watches'])}}" class="btn btn-primary">View More</a>
            </div>
          </div>

          <hr>

          {{-- Jewellery products --}}
          <div class="row">
            <div class="col-12 my-5">
              <h3 class="text-primary text-center font-weight-bold mb-2">Jewellery</h3>
            </div>
            @foreach ($jewellery as $product)
              <!-- product -->
                <div class="col-xl-2 col-md-2 col-6">
                    <a href="{{route('product.view',[$product->id])}}" class="card product-card border shadow-sm">
                      <img src="{{ $product->image1 }}" class="card-img-top" alt="{{$product->title}}">
                        <div class="card-body text-left p-2">
                          <span class="badge bg-info font-weight-bold text-white mb-1">{{$product->category}}</span>
                          <span class="badge bg-primary font-weight-bolder text-white">&#8358; {{number_format($product->price, 2, '.', ',')}}</span>
                          <h6 class="card-title">{{substr($product->title, 0, 50)}}...</h6>
                      </div>
                  </a>
              </div>
            @endforeach
            <div class="col-12 mt-3">
              <a href="{{route('category', ['Jewellery'])}}" class="btn btn-primary">View More</a>
            </div>
          </div>

        </div>

      </center>
    </main>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

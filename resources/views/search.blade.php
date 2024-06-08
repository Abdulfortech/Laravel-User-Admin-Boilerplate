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
@section('title', 'OneStop | Watches')
@php( $page = 'category')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5">
    <center>
        <div class="container big-container col-md-12">
          <div class="row">
            <div class="col-lg-12 row ">
              <!-- listing grid -->
              <div class="col-md-9 order-md-2">
                  <!-- section title -->
                    <div class="section-head col-12 my-2 ">
                        <div class="row d-flex justify-contents-between">
                        <div class="col-12">
                            <h3 class="mb-4 font-weight-bold">
                            <span>
                                <!-- <i class="fa fa-user-circle"></i>  -->
                                Search : {{$term}}
                            </span><br>
                            <span class="small"><small>{{$products->count()}} Results</small></span>
                            </h3>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                      @if($products->count() > 0)
                        @foreach ($products as $product)
                          <!-- product -->
                        <div class="col-xl-3 col-md-3 col-6">
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
                      @else
                        <div class="col-12 container">
                          <hr>
                          <h5 class="text-center"> Sorry! There are no available products that matches your search</h5>
                        </div>
                      @endif

                        {{-- <div class="col-12 mt-4 d-flex justify-contents-center align-items-center text-center">
                            <nav aria-label="Page navigation example" class="mb-4">
                              <ul class="pagination">
                                <li class="page-item">
                                  <a class="page-link" href="javascript:;">1</a>
                                </li>
                                <li class="page-item active">
                                  <a class="page-link" href="javascript:;">2</a>
                                </li>
                                <li class="page-item">
                                  <a class="page-link" href="javascript:;">3</a>
                                </li>
                                <li class="page-item">
                                  <a class="page-link" href="javascript:;">4</a>
                                </li>
                                <li class="page-item">
                                  <a class="page-link" href="javascript:;">5</a>
                                </li>
                              </ul>
                            </nav>
                        </div> --}}

                    </div>
                  </div>
                  <!-- sidebar grid -->
                  <aside class="col-md-3 order-md-1">
                      <div class="card border-0">
                        <div class="card-body p-2">
                          <h4 class="font-weight-bold text-left">Product Categories</h4>
                            <!-- marketing -->
                            <div>
                              <ul class="list-group">
                                @foreach ($categories as $category)
                                  <li class="list-group-item border-0 text-left p-2">
                                    <a href="{{route('category',[$category->title])}}" class="text-dark">>> {{$category->title}}</a>
                                  </li>
                                @endforeach
                              </ul>
                            </div>
                            <hr class="my-4">
                            <!-- sub category -->
                            <div class="">
                              <h4 class="font-weight-bold text-left">Sub Categories </h3>
                              <div>
                                <ul class="list-group">
                                  @foreach ($subcategories as $subcategory)
                                    <li class="list-group-item border-0 text-left p-2">
                                      <a href="{{route('category',[$subcategory->title])}}" class="text-dark">>> {{$subcategory->title}}</a>
                                    </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>

                            <hr class="my-4">
                            <!-- size & gender -->
                            <div class="">
                              <h4 class="font-weight-bold text-left">Gender </h3>
                              <div>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 text-left p-2">
                                      <a href="{{route('category',['Men'])}}" class="text-dark">>> Men </a>
                                    </li>
                                    <li class="list-group-item border-0 text-left p-2">
                                      <a href="{{route('category',['Women'])}}" class="text-dark">>> Women </a>
                                    </li>
                                    <li class="list-group-item border-0 text-left p-2">
                                      <a href="{{route('category',['Kids'])}}" class="text-dark">>> Kids </a>
                                    </li>
                                    <li class="list-group-item border-0 text-left p-2">
                                      <a href="{{route('category',['Unisex'])}}" class="text-dark">>> Unisex </a>
                                    </li>
                                </ul>
                              </div>
                            </div>
                            <hr class="my-4">
                            <!-- brand -->
                            <div class="">
                              <h4 class="font-weight-bold text-left">Brands </h3>
                              <div>
                                <ul class="list-group">
                                  @foreach ($brands as $brand)
                                    <li class="list-group-item border-0 text-left p-2">
                                      <a href="{{route('category',[$brand->title])}}" class="text-dark">>> {{$brand->title}}</a>
                                    </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>

                        </div>

                      </div>
                  </aside>
            </div>
          </div>

        </div>
    </center>
  </div>
  <!-- Wrapper End-->

@include('components.footer')

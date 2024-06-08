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
@section('title', 'OneStop | Product details')
@php( $page = 'product')
@section('contents')
@include('components.navbar')
<style>
  .carousel {
    /* margin-top: 1rem; */
    /* height: 500px; */
  }
  .carousel-item {
    height: 450px;
  }

  .carousel-item img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 450px;
    /* border-radius: 10px; */
  }
  @media only screen and (max-width: 767px) {
    .carousel-item {
      height: 350px;
      /* border-radius: 10px; */
    }
    .carousel-item img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 350px;
      /* border-radius: 10px; */
    }
  }

</style>
  <!-- wrapper start -->
  <div class="wrapper pt-4">
    <center>
        <div class="container bg-white single_product_container col-md-11">
            <div class="row">
                <div class="col-lg-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                        <div class="carousel-inner">
                            @if(isset($product->image1))
                            <div class="carousel-item active">
                                <img src="{{ $product->image1 }}" class="d-block w-100" alt="...">
                            </div>
                            @endif
                            @if(isset($product->image2))
                            <div class="carousel-item">
                                <img src="{{ $product->image2 }}" class="d-block w-100" alt="...">
                            </div>
                            @endif
                            @if(isset($product->image3))
                            <div class="carousel-item">
                                <img src="{{ $product->image3 }}" class="d-block w-100" alt="...">
                            </div>
                            @endif
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
                <div class="col-lg-6">
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>{{$product->title}}</h2>
                            <p class="my-1">
                                Categories : <a href="{{route('category', [$product->category])}}" class="badge badge-primary text-decoration-none">{{$product->category}}</a>
                                <a href="{{route('category', [$product->subcategory])}}" class="badge badge-primary text-decoration-none">{{$product->subcategory}}</a>
                            </p>
                            <p class="my-1">
                                Brand : <a href="{{route('category', [$product->brand])}}" class="badge badge-primary text-decoration-none">{{$product->brand}}</a>
                            </p>
                            <p class="my-4">
                                <span>Reviews : <b class="font-weight-bold text-warning">{{$product->reviews->count()}}</b></span> &nbsp;&nbsp;&nbsp;
                                {{-- <span>Ratings :
                                    <b class="text-warning"><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </b>
                                </span> --}}
                            </p>
                            <!-- <hr> -->
                            <p class="my-4">{{$product->short_desc}}</p>
                            <h4 class="mt-5">
                                <span class="text-muted  font-weight-bold"><s>&#8358; {{number_format($product->normal_price, 2, '.', ',')}}</s></span>
                                <span class="text-danger font-weight-bold">&#8358; {{number_format($product->price, 2, '.', ',')}}</span>
                            </h4>
                        </div>
                        <div class="mt-5 col-12">
                            <a data-toggle="modal" data-target="#orderModal" class="btn btn-primary btn-sm my-2 text-white"><i class="fa fa-shopping-cart"></i> Place Order</a>
                            <a data-toggle="modal" data-target="#reviewModal" class="btn btn-primary  btn-sm my-2 text-white"><i class="fa fa-comment"></i> Review</a>
                            <a data-toggle="modal" data-target="#reportModal" class="btn btn-primary btn-sm my-2 text-white"><i class="fa fa-envelope"></i> Report</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- long description and reviews --}}
        <div class="tabs_section_container">
            <div class="container col-11 tabs_container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Reviews</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <div class="container mt-4 text-justify">
                            <p>{{$product->short_desc}}</p>
                        </div>
                    </div>
                    <div class="tab-pane col-12 fade" id="menu2">
                        <div class=" mt-4">
                            <h2>Reviews({{$product->reviews->count()}})</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="review-container">
                                        @foreach ($product->reviews as $review)

                                        <!-- single review -->
                                        <div class="card mt-3">
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4><i class="fa fa-user-circle" style="font-size: 28px;"></i> {{$review->name}}</h4>
                                                    </div>
                                                </div>
                                                <p class="text-justify">{{$review->review}}</p>
                                                <h6 class="text-left"><i class="fa fa-calendar"></i> {{substr($review->created_at, 0, 10)}}</h6>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('review.store')}}" method="post">
                                      @csrf
                                        <input type="hidden" name="productID" value="{{$product->id}}">
                                        <div class="card-body p-3 text-left">
                                            <h4>Write A Review</h4>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{Auth::check()? auth()->user()->firstName." ".auth()->user()->lastName :''}}" required>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="{{Auth::check()? auth()->user()->phone :''}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="">Review</label>
                                                    <textarea name="review" class="form-control" rows="5" placeholder="Write your review" required></textarea>
                                                </div>
                                            </div>
                                            <center><button type="submit" class="btn btn-primary">Submit</button></center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- similar products --}}
        <div class="col-md-12">
            <div class="row text-left mt-4">
                <div class="col-12"><h3>Similiar Products</h3></div>
                    @foreach ($products as $product)
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
                <div class="col-12">
                    <center><a href="{{route('category',[$product->category])}}" class="btn btn-primary">View More</a></center>
                </div>
            </div>
        </div>
    </center>
  </div>
  <!-- Wrapper End-->

<!-- order modal -->
<div class="modal" id="orderModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Place Order</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{route('placeOrder')}}" method="post">
            @csrf
            <input type="hidden" name="productID" value="{{$product->id}}">
            <input type="hidden" name="subtotal" value="{{$product->price}}">
            <input type="hidden" name="total" value="{{$product->price}}">
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{Auth::check()? auth()->user()->firstName." ".auth()->user()->lastName :''}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{Auth::check()? auth()->user()->phone:''}}" required>
                </div>
                <div class="col-md-7">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" value="{{Auth::check()? auth()->user()->address:''}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">Delivery Type</label>
                    <select name="deliveryType" class="form-control" required>
                        <option value="">Choose..</option>
                        <option>Pick Up</option>
                        <option>Delivery</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" min="1" name="quantity" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Description</label>
                <textarea name="description" class="form-control" id="" rows="5" placeholder="Describe size, colour or anything else"></textarea>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>

      </div>
    </div>
</div>
<!-- review modal -->
<div class="modal" id="reviewModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Product Review</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{route('review.store')}}" method="post">
              @csrf
                <input type="hidden" name="productID" value="{{$product->id}}">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::check()? auth()->user()->firstName." ".auth()->user()->lastName :''}}" required>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::check()? auth()->user()->phone :''}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Review</label>
                        <textarea name="review" class="form-control" rows="5" placeholder="Write your review" required></textarea>
                    </div>
                </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>

      </div>
    </div>
</div>
<!-- report modal -->
<div class="modal" id="reportModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Report a Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{route('report.store')}}" method="post">
              @csrf
                <input type="hidden" name="productID" value="{{$product->id}}">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::check()? auth()->user()->firstName." ".auth()->user()->lastName :''}}" required>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{Auth::check()? auth()->user()->phone :''}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="">Body</label>
                        <textarea name="body" class="form-control" rows="5" placeholder="Write your report" required></textarea>
                    </div>
                </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>

      </div>
    </div>
</div>


@include('components.footer')

<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Vendor Information')
@php( $page = 'vendors')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper">
    <section class="section-profile-cover section-shaped my-0">
      <!-- Circles background -->
      <img class="bg-image" src="{{ asset('storage/' . $vendor->banner) }}" style="width: 100%;">
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-secondary" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="section bg-secondary">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="javascript:;">
                    <img src="{{ asset('storage/' . $vendor->logo) }}" width="150" height="150" class="rounded-circle">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <a data-toggle="modal" data-target="#settingModal" class="btn btn-sm btn-primary text-white mr-1"> Settings</a>
                  <a href="product-new" class="btn btn-sm btn-primary text-white"><i class="fa fa-plus"></i> Product</a>
                  <a  href="messages" class="btn btn-sm btn-danger text-white mr-1"> Messages</a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">{{$productCount}}</span>
                    <span class="description">Products</span>
                  </div>
                  <div>
                    <span class="heading">{{$orderCount}}</span>
                    <span class="description">Orders</span>
                  </div>
                  <div>
                    <span class="heading">{{$reviewCount}}</span>
                    <span class="description">Reviews</span>
                  </div>
                  <div>
                    <span class="heading">{{$messageCount}}</span>
                    <span class="description">Messages</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center mt-5">
              <h2 class="mb-0 font-weight-bold">{{$vendor->name}}<span class="font-weight-bold"></span></h3>
              <div class="h6 font-weight-300 mt-0 small"><a href="{{url('/').'/'. $vendor->slang}}"><i class="ni location_pin mr-2"></i>{{url('/').'/'. $vendor->slang}}</a></div>
              <div class="h6 mt-2"><i class="ni business_briefcase-24 mr-2"></i>{{$vendor->motto}}</div>
              <!-- <div><i class="ni education_hat mr-2"></i>Kano, Nigeria.</div> -->
            </div>

            <div class="mt-5 py-4 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h5>About Us</h5>
                  <p class="text-justify">{{$vendor->description}}</p>
                </div>
              </div>
            </div>

            <div class="mt-4 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                    <h5>Contact Us</h5>
                    <p class="mb-1">
                        <a href="tel:{{$vendor->phone1}}" class="text-muted"><i class="fa fa-phone" style="font-size: 20px;"></i> {{$vendor->phone1}}</a>
                        @if($vendor->phone2)
                        ,
                        <a href="tel:{{$vendor->phone2}}" class="text-muted"><i class="fa fa-phone" style="font-size: 20px;"></i> {{$vendor->phone2}}</a>
                        @endif
                    </p>
                    <p class="mb-0"><i class="fa fa-map-marker" style="font-size: 20px;"></i> {{$vendor->address}}</p>

                    <p class="my-2">
                        @if($vendor->whatsapp)
                            <a href="https://wa.me/{{$vendor->whatsapp}}" class="btn btn-primary py-1 mx-2"><i class="fa fa-whatsapp" style="font-size: 18px;"></i></a>
                        @endif
                        @if($vendor->website)
                            <a href="{{$vendor->website}}" class="btn btn-primary py-1 mx-2"><i class="fa fa-globe" style="font-size: 18px;"></i></a>
                        @endif
                        @if($vendor->email)
                            <a href="mailto:{{$vendor->email}}" class="btn btn-primary py-1 mx-2"><i class="fa fa-envelope" style="font-size: 18px;"></i></a>
                        @endif
                        @if($vendor->facebook)
                            <a href="{{$vendor->facebook}}" class="btn btn-primary py-1 mx-2"><i class="fa fa-facebook" style="font-size: 18px;"></i></a>
                        @endif
                        @if($vendor->instagram)
                            <a href="{{$vendor->instagram}}" class="btn btn-primary py-1 mx-2"><i class="fa fa-instagram" style="font-size: 18px;"></i></a>,
                        @endif
                    </p>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="section-head my-5 text-center">
            <h3 class="mb-5 font-weight-bold">
              <span>Our Products</span>
            </h3>
        </div>
        <div class="row">
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="product-view.html" class="card product-card border shadow-sm">
                    <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                        <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                    </div>
                </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
              <a href="product-view.html" class="card product-card border shadow-sm">
                  <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                  <div class="card-body text-left p-2">
                      <span class="badge bg-info font-weight-bold text-white mb-1">Kitchen ware</span>
                      <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                      <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                  </div>
              </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="product-view.html" class="card product-card border shadow-sm">
                    <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                        <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                    </div>
                </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
              <a href="product-view.html" class="card product-card border shadow-sm">
                  <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                  <div class="card-body text-left p-2">
                      <span class="badge bg-info font-weight-bold text-white mb-1">Kitchen ware</span>
                      <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                      <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                  </div>
              </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="product-view.html" class="card product-card border shadow-sm">
                    <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                        <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                    </div>
                </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
              <a href="product-view.html" class="card product-card border shadow-sm">
                  <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                  <div class="card-body text-left p-2">
                      <span class="badge bg-info font-weight-bold text-white mb-1">Kitchen ware</span>
                      <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                      <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                  </div>
              </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
                <a href="product-view.html" class="card product-card border shadow-sm">
                    <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body text-left p-2">
                        <span class="badge bg-info font-weight-bold text-white mb-1">Shoes</span>
                        <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                        <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                    </div>
                </a>
            </div>
            <!-- product -->
            <div class="col-md-3 col-6">
              <a href="product-view.html" class="card product-card border shadow-sm">
                  <img src="../assets/img/faces/fezbot.jpg" class="card-img-top" alt="Product 1">
                  <div class="card-body text-left p-2">
                      <span class="badge bg-info font-weight-bold text-white mb-1">Kitchen ware</span>
                      <span class="badge bg-primary font-weight-bolder text-white">&#8358; 123,000</span>
                      <h6 class="card-title">Product Electronics Machines Electronics Machines...</h6>
                  </div>
              </a>
            </div>
        </div>
      </div>
      <div class="justify-content-center col-12 bg-white">
        <center>
            <div class="col-11 bg-white py-4">
                <div class="section-head my-5 text-center">
                    <h3 class="mb-5 font-weight-bold">
                        <span>Reviews</span>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="review-container p-3">
                            <!-- single review -->
                            <div class="card mt-3">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>

                                            <h5><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h5>
                                        </div>
                                    </div>
                                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                    <h6 class="text-left"><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                </div>
                            </div>
                            <!-- single review -->
                            <div class="card mt-3">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>

                                            <h5><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h5>
                                        </div>
                                    </div>
                                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                    <h6 class="text-left"><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                </div>
                            </div>
                            <!-- single review -->
                            <div class="card mt-3">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>

                                            <h5><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h5>
                                        </div>
                                    </div>
                                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                    <h6 class="text-left"><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                </div>
                            </div>
                            <!-- single review -->
                            <div class="card mt-3">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>

                                            <h5><i class="fa fa-user-circle" style="font-size: 28px;"></i> AbdulFortech</h5>
                                        </div>
                                    </div>
                                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt maxime autem sequi unde voluptatibus quo error earum amet odit. Atque consequatur inventore deserunt alias.</p>
                                    <h6 class="text-left"><i class="fa fa-calendar"></i> 12/12/2024</h6>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <form action="" class="card mt-4 text-left">
                            <div class="card-body p-3">
                                <h4>Write A Review</h4>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input class="form-control" placeholder="Name" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input class="form-control" placeholder="Phone Number" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">Review</label>
                                    <textarea class="form-control" rows="6"></textarea>
                                </div>
                                <center><button type="submit" class="btn btn-primary">Submit</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
    </section>
    <!-- footer -->

    <!-- The Modal -->
    <div class="modal" id="settingModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <center>
                        <a href="{{route('vendor.edit', [$vendor->id])}}" class="btn btn-primary py-2 my-1"><i class="fa fa-edit"></i> Edit</a>
                        <a href="{{route('vendor.pictures', [$vendor->id])}}" class="btn btn-primary py-2 my-1"><i class="fa fa-image"></i> Pictures</a>
                        @if($vendor->status == "Active")
                            <a href="{{route('vendor.deactivate', [$vendor->id])}}" class="btn btn-primary py-2 my-1"><i class="fa fa-arrow-down"></i> Deactivate</a>
                        @endif
                        @if($vendor->status == "Inactive")
                            <a href="{{route('vendor.activate', [$vendor->id])}}" class="btn btn-primary py-2 my-1"><i class="fa fa-arrow-up"></i> Activate</a>
                        @endif
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="messageModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Send a Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="">Message</label>
                            <textarea class="form-control" rows="5" name="body" required></textarea>
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


  <!-- Wrapper End-->

@include('components.footer')

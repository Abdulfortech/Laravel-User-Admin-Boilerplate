<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Checkout')
@php( $page = 'checkout')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <div class="col-lg-12 px-0">
        <div class="section-head my-5 text-center">
            <h1 class="mb-5 font-weight-bold">
              <span>Subscription</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-7 col-lg-8 mx-auto">
                <h4 class="mb-3">Vendor Information</h4>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Name : </b> <span id="firstName">{{$vendor->name}}</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Category : </b> <span id="firstName" class="">{{$vendor->category}}</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Market : </b> <span id="firstName" class="">{{$vendor->market}}</span>
                            </li>
                        </ol>
                    </div>
                </div>
                <h4 class="mb-3">Service Information</h4>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Service : </b> <span id="firstName">{{$package->title}}</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Price : </b> <span id="firstName" class="font-weight-bolder h5">&#8358; {{number_format($package->price, 2, '.', ',')}}</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Discount : </b> <span id="firstName" class="font-weight-bolder h5">&#8358; 0.00</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Period : </b> <span id="firstName" class="font-weight-bolder h5">Annually</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Next Pay : </b> <span id="firstName" class="font-weight-bolder h5">{{substr($dueDate, 0, 10)}}</span>
                            </li>
                        </ol>
                    </div>
                </div>
                <input type="hidden" id="vendorID" name="vendorID" value="{{$vendor->id}}">
                <input type="hidden" id="packageID" name="packageID" value="{{$package->id}}">
                <input type="hidden" id="total" name="total" value="{{$package->price}}">
                <input type="hidden" id="dueDate" name="dueDate" value="{{$dueDate}}">
                <form id="paymentForm">
                        <input type="email" id="email-address" value="{{auth()->user()->email}}" hidden />
                        <input type="tel" id="amount" value="{{$package->price}}" hidden />
                        <input type="text" id="first-name" value="{{auth()->user()->firstName}}" hidden/>
                        <input type="text" id="last-name" value="{{auth()->user()->lastName}}" hidden/>
                      <div class="form-submit">
                        <button class="w-100 btn btn-primary btn-lg" onclick="payWithPaystack()" type="submit">Proceed to Payment</button>
                      </div>
                </form>
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

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
     var userID =  "{{ auth()->user()->id}}";
     var vendorID =  "{{ $vendor->id}}";
     var packageID =  "{{ $package->id}}";
     var dueDate =  "{{ $dueDate}}";
     var amount =  document.getElementById("amount").value;
     var fees =  0.00;
     var discount =  0.00;
     var total =  document.getElementById("amount").value;
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
    e.preventDefault();

    let handler = PaystackPop.setup({
        key: 'pk_test_8af7fb12b568ccb4597bdddae81c9896d08273b3', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: document.getElementById("amount").value * 100,
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
        alert('Window closed.');
        },
        callback: function(response){
            let formData = new FormData();
                formData.append("reference", response.reference);
                formData.append("vendorID", vendorID);
                formData.append("packageID", packageID);
                formData.append("userID", userID);
                formData.append("dueDate", dueDate);
                formData.append("amount", amount);
                formData.append("discount", discount);
                formData.append("fees", fees);
                formData.append("total", total);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: "/vendor/verify-payment",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.success) {
                            toastr.success(data.message);
                            setTimeout(function() {
                                window.location.href = "/vendor/view/"+ vendorID;
                            }, 1000);
                        } else {
                            toastr.error(data.message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 10000);
                        }
                    }
                });
        }
    });

    handler.openIframe();
    }

</script>
@endpush

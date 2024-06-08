<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.userLayout')
@section('title', 'OneStop | Add Vendor')
@php( $page = 'vendor')
@section('contents')
@include('components.navbar')
  <!-- wrapper start -->
  <div class="wrapper mt-5 pt-4">
    <div class="container mt-5 col-md-10">
      <div class="col-lg-12 px-0">
        <div class="section-head my-5 text-center">
            <h1 class="mb-5 font-weight-bold">
              <span>New Vendor Registration</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
            <div class="card info-card sales-card">
                <div class="card-body text-center align-items-center">
                    <div id="stepperForm" class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#test-form-1">
                            <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1">
                                <span class="bs-stepper-circle">1</span>
                                <!-- <span class="bs-stepper-label">Business</span> -->
                            </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-form-2">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2">
                                    <span class="bs-stepper-circle">2</span>
                                    <!-- <span class="bs-stepper-label">About</span> -->
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-form-3">
                                <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3">
                                    <span class="bs-stepper-circle">3</span>
                                    <!-- <span class="bs-stepper-label">Contacts</span> -->
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form class="needs-validation text-left" enctype="multipart/form-data" action="{{route('vendor.store')}}" method="POST" novalidate>
                                @csrf
                                <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade align-items-start text-start" aria-labelledby="stepperFormTrigger1">
                                    <h6 class="text-center">Basic Information</h6>
                                    <div class="form-group align-items-start mb-2">
                                        <label for="businessName">Name <span class="text-danger font-weight-bold">*</span></label>
                                        <input id="businessName" name="name" type="text" class="form-control" placeholder="Enter business Name" required>
                                        @error('name')
                                            <span class="text-danger small">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group align-items-start row">
                                        <div class="col-md-7 mb-2">
                                            <label for="motto">Business Motto <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="motto" type="text" name="motto" class="form-control" placeholder="Enter business Motto" required>
                                            @error('motto')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 mb-2">
                                            <label for="businessType">Market <span class="text-danger font-weight-bold">*</span></label>
                                            <select id="market" name="market" class="form-control" required>
                                                <option value="">Choose..</option>
                                                <option>Kwari Market</option>
                                                <option>Wambai Market</option>
                                                <option>Sabon Gari</option>
                                            </select>
                                            @error('market')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group align-items-start row">
                                        <div class="col-md-6 mb-2">
                                            <label for="businessType">Nature of Business <span class="text-danger font-weight-bold">*</span></label>
                                            <select id="nature" name="nature" class="form-control" required>
                                                <option value="">Choose..</option>
                                                <option>Manufacturing</option>
                                                <option>Service Provider</option>
                                                <option>Trade</option>
                                            </select>
                                            @error('nature')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="businessCategory">Business Category <span class="text-danger font-weight-bold">*</span></label>
                                            <select id="businessCategory" name="category" class="form-control" required>
                                                <option value="">Choose..</option>
                                                <option>Textile & Fashion</option>
                                                <option>Electronics & Computers</option>
                                                <option>Furnitures & Households</option>
                                                <option>Foods</option>
                                            </select>
                                            @error('category')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group align-items-start mb-2">
                                        <label for="businessDesc">Business Description <span class="text-danger font-weight-bold">*</span></label>
                                        <textarea name="description" id="businessDesc" class="form-control" rows="4" placeholder="Describe Your Business" required></textarea>
                                        @error('description')
                                            <span class="text-danger small">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <center>
                                        <button type="button" class="btn btn-primary btn-next-form">Next</button>
                                    </center>
                                </div>
                                <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade align-items-start text-start" aria-labelledby="stepperFormTrigger2">
                                    <h6 class="text-center">Contact Information</h6>
                                    <div class="form-group align-items-start row">
                                        <div class="col-md-6 mb-2">
                                            <label for="businessPhone1">Phone Number 1 <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="businessPhone1" name="phone1" type="text" class="form-control" placeholder="Enter phone number 1" required>
                                            @error('phone1')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="businessPhone2">Phone Numer 2 <span class="small ">(optional)</span></label>
                                            <input id="businessPhone2" name="phone2" type="text" class="form-control" placeholder="Enter phone number 2">
                                            @error('phone2')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="businessEmail">E-mail <span class="small ">(optional)</span></label>
                                            <input id="businessEmail" name="email" type="email" class="form-control" placeholder="Enter email">
                                            @error('email')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="businessWebsite">Business Website <span class="small ">(optional)</span></label>
                                            <input id="businessWebsite" name="website" type="text" class="form-control" placeholder="Enter website">
                                            @error('website')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="lga">Local Goverment <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="businesslga" name="lga" type="text" class="form-control" placeholder="Enter LGA you operate">
                                            @error('lga')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="state">State <span class="text-danger font-weight-bold">*</span></label>
                                            <select id="state" name="state" class="form-control" required>
                                                <option value="">Choose..</option>
                                                @include('components.state-list')
                                            </select>
                                            @error('state')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="address">Address <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="address" name="address" type="text" class="form-control" placeholder="Enter business address" required>
                                            @error('address')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-previous-form">Previous</button>
                                    <button type="button" class="btn btn-primary btn-next-form">Next</button>
                                </div>
                                <div id="test-form-3" role="tabpanel" class="bs-stepper-pane fade align-items-start text-start" aria-labelledby="stepperFormTrigger3">
                                    <h6 class="text-center">Other Information</h6>
                                    <div class="form-group align-items-start row">
                                        <div class="col-md-6 mb-2">
                                            <center>
                                                <div class="banner-preview mt-3 border" id="bannerPreview"></div>
                                            </center>
                                            <label for="banner">Banner (300x1200) <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="banner" type="file" class="form-control" name="banner" accept="image/*" onchange="displayBanner(this)" required>
                                            @error('banner')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <center>
                                                <div class="logo-preview mt-3 border" id="logoPreview"></div>
                                            </center>
                                            <label for="logo">Logo<span class="text-danger font-weight-bold">*</span></label>
                                            <input id="logo" type="file" class="form-control" name="logo" accept="image/*" onchange="displayLogo(this)" required>
                                            @error('logo')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="facebook">WhatsApp Number <span class="text-danger font-weight-bold">*</span></label>
                                            <input id="facebook" name="whatsapp" type="number" class="form-control" placeholder="Enter Whatsapp Number">
                                            @error('whatsapp')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="facebook">Instagram Page Link: <span class="small ">(optional)</span></label>
                                            <input id="facebook" name="instagram" type="text" class="form-control" placeholder="Enter Instagram Page Link">
                                            @error('instagram')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="facebook">Facebook Page Link: <span class="small ">(optional)</span></label>
                                            <input id="facebook" name="facebook" type="text" class="form-control" placeholder="Enter Facebook Page Link">
                                            @error('facebook')
                                                <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-previous-form mt-5">Previous</button>
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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

<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'Company')
@php( $page = 'Components')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        {{-- @include('components.admin.header') --}}
        <div class="row">
            <div class="col-md-8 mx-auto">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="text-center ">
                    <h4 class="mb-0 fw-bold">Company Profile</h4>
                    <!-- <button class="btn btn-primary btn-sm ms-auto">Company Profile</button> -->
                  </div>
                </div>
                <div class="card-body">
                  <p class="text-uppercase text-sm">Company Information</p>
                  <form action="{{ route('admin.updateCompany') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Business title</label>
                          <input class="form-control" type="text" name="title" value="{{isset(auth()->user()->business->title)?auth()->user()->business->title : ''}}" required>
                          @error('title')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Motto</label>
                          <input class="form-control" type="text" name="motto" value="{{isset(auth()->user()->business->motto)?auth()->user()->business->motto : ''}}" required>
                          @error('motto')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Industry</label>
                          <input class="form-control" type="text" name="industry" value="{{isset(auth()->user()->business->industry)?auth()->user()->business->industry : ''}}" required>
                          @error('industry')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Business Abbreviation</label>
                          <input class="form-control" type="text" name="abbr" value="{{isset(auth()->user()->business->abbr)?auth()->user()->business->abbr : ''}}" required>
                          @error('abbr')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">CAC Reg. No.</label>
                          <input class="form-control" type="text" name="reg_no" value="{{isset(auth()->user()->business->reg_no)?auth()->user()->business->reg_no : ''}}" >
                          @error('reg_no')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Tax No.</label>
                          <input class="form-control" type="text" name="tax_no" value="{{isset(auth()->user()->business->tax_no)?auth()->user()->business->tax_no : ''}}" >
                          @error('tax_no')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Contact Information</p>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Phone Number 1</label>
                          <input class="form-control" type="text" name="phone1" value="{{isset(auth()->user()->business->phone1)?auth()->user()->business->phone1 : ''}}" required>
                          @error('phone1')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Phone Number 2</label>
                          <input class="form-control" type="text" name="phone2" value="{{isset(auth()->user()->business->phone2)?auth()->user()->business->phone2 : ''}}" required>
                          @error('phone2')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Email address</label>
                          <input class="form-control" type="email" name="email" value="{{isset(auth()->user()->business->email)?auth()->user()->business->email : ''}}" required>
                          @error('email')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Website</label>
                          <input class="form-control" type="text" name="website" value="{{isset(auth()->user()->business->website)?auth()->user()->business->website : ''}}" required>
                          @error('website')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Address</label>
                          <input class="form-control" type="text" name="address" value="{{isset(auth()->user()->business->address)?auth()->user()->business->address : ''}}" required>
                          @error('address')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">State</label>
                          <input class="form-control" type="text" name="state" value="{{isset(auth()->user()->business->state)?auth()->user()->business->state : ''}}" required>
                          @error('state')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Account Information</p>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Account Name</label>
                          <input class="form-control" type="text" name="account_name" value="{{isset(auth()->user()->business->account_name)?auth()->user()->business->account_name : ''}}" required>
                          @error('account_name')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Account Number</label>
                          <input class="form-control" type="text" name="account_number" value="{{isset(auth()->user()->business->account_number)?auth()->user()->business->account_number : ''}}" required>
                          @error('account_number')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Bank Name</label>
                          <input class="form-control" type="text" name="account_bank" value="{{isset(auth()->user()->business->account_bank)?auth()->user()->business->account_bank : ''}}" required>
                          @error('account_bank')
                              <span class="text-danger small">{{ $message}}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <center>
                      <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                    </center>
                  </form>
                </div>
              </div>
            </div>
        </div>
  </div>
  @include('components.admin.footer')
    </div>
  </main>

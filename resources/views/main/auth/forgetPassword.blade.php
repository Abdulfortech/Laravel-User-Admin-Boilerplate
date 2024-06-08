<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.user.authLayout')
@section('title', 'Forget Password')
@section('contents')
<div class="wrapper">
    <section class="login-content">
        <div class="row m-0 align-items-center bg-white vh-100">
        <div class="col-md-6">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                    <div class="card-body">
                        <a href="login" class="navbar-brand d-flex align-items-center mb-3">
                            <div class="logo-main">
                                <div class="logo-normal">
                                <center>
                                    <img src="{{ asset('app/assets/images/logos/aarasheeddata2.png') }}" width="150" height="70">
                                </center>
                                </div>
                                <div class="logo-mini">
                                <center>
                                    <img src="{{ asset('app/assets/images/logos/aarasheeddata2.png') }}" width="150" height="70">
                                </center>
                                </div>
                            </div>
                        </a>
                        <form id="login-form" action="{{ route('user.forgetPassword') }}" method="POST">
                            @csrf
                            <h2 class="mb-2">Forgot Password?</h2>
                                <p>Enter your phone number and we'll send you an OTP to verify you before reseting your password.
                                </p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                            <span class="text-danger small">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-12" id="submitButton">Submit</button>
                            </div>
                            <p class="mt-3 text-center">
                                Don’t have an account? <a href="{{ route('user.signup')}}" class="text-underline">Click here to register.</a>
                            </p>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
            <img src="{{ asset('app/assets/images/logos/lg.jpg') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
        </div>
        </div>
    </section>
</div>

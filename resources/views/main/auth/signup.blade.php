<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.authLayout')
@section('title', 'Sign Up')
@section('contents')

<section class="section section-shaped section-lg">
    <div class="shape shape-style-1 bg-gradient-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container pt-lg-4">
        <div class="text-muted text-center mb-4">
            <h1 class="font-weight-bolder text-primary">OneStop</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-muted text-center mb-3">
                            <h2 class="font-weight-bolder text-primary">Sign Up</h2>
                        </div>
                        <div class="text-center text-dark mb-4">
                            <p class="h6">Create an Account</p>
                        </div>
                        <form role="form" class="text-dark" action="{{ route('auth.signup') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-alternative mb-1">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input name="firstName" value="{{ old('firstName') }}" class="form-control text-dark" placeholder="First Name" type="text" required>
                                    </div>
                                    @error('firstName')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-alternative mb-1">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input name="lastName" value="{{ old('lastName') }}" class="form-control" placeholder="Last Name" type="text" required>
                                    </div>
                                    @error('lastName')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-1">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input name="phone" value="{{ old('phone') }}" class="form-control text-dark" placeholder="Phone" type="text" required>
                                </div>
                                @error('phone')
                                    <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group input-group-alternative mb-1">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input class="form-control text-dark"  placeholder="Password" type="password" name="password" required>
                                    </div>
                                    @error('password')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-alternative mb-1">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input name="password_confirmation" class="form-control" placeholder="Confirm Password" type="password" required>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger small">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                <label class="custom-control-label text-dark" for="customCheckRegister"><span>I agree with the <a href="#">Privacy Policy</a></span></label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Create account</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <a href="{{route('auth.login')}}" class="text-light"><small>Have an Account? Sign In</small></a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('index')}}" class="text-light"><small>Back to Home</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

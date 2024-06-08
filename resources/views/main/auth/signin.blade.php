<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.main.authLayout')
@section('title', 'Sign In')
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
    <div class="container pt-lg-3">
        <div class="text-muted text-center mb-4">
            <h1 class="font-weight-bolder text-white">OneStop</h1>
        </div>
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-muted text-center mb-3">
                <h2 class="font-weight-bolder text-primary">Sign In</h2>
              </div>
              <div class="text-center text-dark mb-4">
                <p>Provide Your Phone Number and Pasword to Sign In</p>
              </div>
              <form role="form" action="{{route('auth.signin')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input name="phone" class="form-control text-dark" value="{{ old('phone') }}" placeholder="Phone Number" type="text" required>
                  </div>
                  @error('phone')
                      <span class="text-danger small">{{ $message}}</span>
                  @enderror
                </div>
                <div class="form-group focused">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input name="password" class="form-control" placeholder="Password" type="password" required>
                  </div>
                  @error('password')
                      <span class="text-danger small">{{ $message}}</span>
                  @enderror
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label text-dark" for=" customCheckLogin"><span>Remember me</span></label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="{{route('auth.showForgetPassword')}}" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{route('auth.register')}}" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

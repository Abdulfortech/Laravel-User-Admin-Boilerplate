<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.adminLayout')
@section('title', 'Referrals')
@php( $page = 'referrals')
@section('contents')
@include('components.admin.sidebar')
<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        @include('components.admin.navbar')
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                              <h1>Wallet Fundings</h1>
                                <p>Wallet Funding History</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="{{ asset('app/assets/images/dashboard/top-header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
            </div>
        </div>
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <!-- info card -->
            <div class="col-md-3 col-6">
              <a href="#" class="card rounded-2 p-0">
                <div class="card-body p-2 py-4">
                      <div class="row">
                        <div class="col-md-4 text-center">
                          <span class="fa-stack fa-2x">
                              <i class="fas fa-circle fa-stack-2x text-primary"></i>
                              <i class="fas fa-share fa-stack-1x fa-inverse"></i>
                          </span>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-muted">All Referrals</p>
                                <h5 class="card-title"><span id="total_referrals">{{$countAllReferrals}}</span></h5>
                        </div>
                    </div>
                </div>
              </a>
            </div>
            <!-- info card -->
            <div class="col-md-3 col-6">
              <a href="#" class="card rounded-2 p-0">
                <div class="card-body p-2 py-4">
                      <div class="row">
                        <div class="col-md-4 text-center">
                          <span class="fa-stack fa-2x">
                              <i class="fas fa-circle fa-stack-2x text-primary"></i>
                              <i class="fas fa-share fa-stack-1x fa-inverse"></i>
                          </span>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-muted">Active Referrals</p>
                            <h5 class="card-title"><span id="active_referrals">{{$countActiveReferrals}}</span></h5>
                        </div>
                    </div>
                </div>
              </a>
            </div>
            <!-- info card -->
            <div class="col-md-3 col-6">
              <a href="#" class="card rounded-2 p-0">
                <div class="card-body p-2 py-4">
                      <div class="row">
                        <div class="col-md-4 text-center">
                          <span class="fa-stack fa-2x">
                              <i class="fas fa-circle fa-stack-2x text-primary"></i>
                              <i class="fas fa-share fa-stack-1x fa-inverse"></i>
                          </span>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-muted">Sattled Referrals</p>
                            <h5 class="card-title"><span id="sattled_referrals">{{$countSattledReferrals}}</span></h5>
                        </div>
                    </div>
                </div>
              </a>
            </div>
            <!-- info card -->
            <div class="col-md-3 col-6">
              <a href="#" class="card rounded-2 p-0">
                <div class="card-body p-2 py-4">
                      <div class="row">
                        <div class="col-md-4 text-center">
                          <span class="fa-stack fa-2x">
                              <i class="fas fa-circle fa-stack-2x text-primary"></i>
                              <i class="fas fa-share fa-stack-1x fa-inverse"></i>
                          </span>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-muted">Total Payout</p>
                            <h5 class=" card-title">&#8358; <span id="total_payout">{{$sumOfCommissions}}</span></h5>
                        </div>
                    </div>
                </div>
              </a>
            </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">Referrals</h4>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Referrer</th>
                                <th>Beneficiary</th>
                                <th>Commission</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($count =1)
                            @foreach($referrals as $referral)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$referral->user->username}}</td>
                                <td>{{$referral->referrer}}</td>
                                <td>&#8358; {{number_format($referral->commission, 2, '.', ',')}}</td>
                                <td>{{$referral->status}}</td>
                                <td>{{$referral->created_at}}</td>
                            </tr>
                            @php($count++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
          </div>

        </div>
      </div>

    </div>
    @include('components.admin.footer')
</main>
@push('script2')
<script>
</script>
@endpush

<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.adminLayout')
@section('title', 'Transactions')
@php( $page = 'transactions')
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
                              <h1>Transactions</h1>
                                <p>Wallet Transaction History</p>
                            </div>
                            {{-- <div>
                              <a type="button" href="{{route('admin.admins.add')}}" class="btn btn-link btn-soft-light">
                                <i class="fa fa-plus"></i>
                                New Admin
                              </a>
                            </div> --}}
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
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">All Transactions ({{$transactionCounts}})</h4>
                </div>
              </div>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                        <tr>
                        <th>S/N</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Balance Before</th>
                        <th>Amount</th>
                        <th>Balance After</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($count = 1)
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{isset($transaction->user_id)?$transaction->user->username:''}}</td>
                        <td>{{$transaction->type}}</td>
                        <td>&#8358; {{number_format($transaction->balanceBefore, 2, '.', ',')}}</td>
                        <td>&#8358; {{number_format($transaction->amount, 2, '.', ',')}}</td>
                        <td>&#8358; {{number_format($transaction->balanceAfter, 2, '.', ',')}}</td>
                        <td>{{$transaction->note}}</td>
                        <td>{{$transaction->status}}</td>
                        <td>
                            <a href="{{route('admin.showTransaction',[$transaction->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        </td>
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

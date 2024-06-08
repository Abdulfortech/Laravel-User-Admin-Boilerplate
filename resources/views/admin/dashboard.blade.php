<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'Dashboard')
@php( $page = 'index')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @include('components.admin.header')
      <div class="row">
        <!-- admins card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Admins</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($adminsCount)}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($adminsCount)}}
                      </span>
                      Total Admins
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- suppliers card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Suppliers</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($suppliersCount)}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($suppliersCount)}}
                      </span>
                      Total Suppliers
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- users card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Users</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($usersCount)}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($usersCount)}}
                      </span>
                      Users
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- products card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Products</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($productsCount)}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-briefcase text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($productsCount)}}
                      </span>
                      Total Products
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- orders card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Orders</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($ordersCount)}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-shopping-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($ordersCount)}}
                      </span>
                      Total Orders
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- payments card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Payments</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($paymentsCount)}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-credit-card text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($paymentsCount)}}
                      </span>
                      Total Payments
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- reviews card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Reviews</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($reviewsCount)}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-piggy-bank text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($reviewsCount)}}
                      </span>
                      Total Reviews
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- reports card -->
        <div class="col-xl-3 col-sm-6  mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Reports</p>
                    <h5 class="font-weight-bolder">
                      {{number_format($reportsCount)}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-piggy-bank text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">
                        {{number_format($reportsCount)}}
                      </span>
                      Total Reviews
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
  </div>
  @include('components.admin.footer')
    </div>
  </main>

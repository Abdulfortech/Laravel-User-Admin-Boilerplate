<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'User Logs')
@php( $page = 'Users')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="container text-center"><h2 class="text-white">User Logs</h2></div>
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6 class="float-start">{{$user->firstName . " ". $user->lastName}}'s Logs</h6>
              </div>
              <div class="card-body px-2 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="datatable">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary font-weight-bolder">S/N</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Username</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">IP Address</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Status</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Created On</th>
                        <th class="text-uppercase text-secondary font-weight-bolder">Updated On</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php($count = 1)
                        @foreach($logs as $log)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$log->username}}</td>
                            <td>{{$log->IPAddress}}</td>
                            <td>{{$log->status}}</td>
                            <td>{{$log->created_at}}</td>
                            <td>{{$log->updated_at}}</td>
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
    </div>
  </main>

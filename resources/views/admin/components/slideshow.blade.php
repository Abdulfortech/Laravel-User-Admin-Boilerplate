<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'SlideShows')
@php( $page = 'components')
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
            <div class="col-md-12 mx-auto">
                <div class="card">
                  <div class="card-header pb-0">
                    <div class="d-flex align-items-center ">
                      <h4 class="mb-0 fw-bold">SlideShows</h4>
                      <a data-bs-toggle="modal" data-bs-target="#addSlideShowModal" class="btn btn-primary btn-sm ms-auto"> <i class="fa fa-plus"></i> Slide Show</a>
                    </div>
                  </div>
                  <div class="card-body row p-2">
                    @foreach($slideshows as $slide)
                    <!--card -->
                    <div class="col-md-4 mb-4">
                        <a class="card slideshow" href="{{route('admin.slideshowView', [$slide->id])}}" style="text-decoration: none;">
                            <div class="card-body p-2" >
                                <img src="{{ asset('storage/' .  $slide->picture)}}" alt="">
                            </div>
                        </a>
                    </div>
                    @endforeach

                  </div>
                </div>
            </div>
        </div>
  </div>
  @include('components.admin.footer')
    </div>
  </main>

  <div class="modal" id="addSlideShowModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Slide Show</h4>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal">
                    <i class="fa fa-times" style="font-size:20px;"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="addLgaForm" action="{{route('admin.addSlideshow')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Picture(1250x500)</label>
                                <input class="form-control" name="picture" id="addTitle" type="file" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Placement</label>
                                <select class="form-control" name="placement" id="addTitle" required>
                                    <option value="">Choose..</option>
                                    <option>First</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary" id="addDepartmentButton">Submit</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

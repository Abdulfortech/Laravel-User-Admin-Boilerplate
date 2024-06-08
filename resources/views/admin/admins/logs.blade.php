<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">

@extends('layout.admin.adminLayout')
@section('title', 'Admins')
@php( $page = 'admins')
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
                              <h1>Admins!</h1>

                            </div>
                            <div>
                              <a type="button" href="{{route('admin.admins.add')}}" class="btn btn-link btn-soft-light">
                                <i class="fa fa-plus"></i>
                                New Admin
                              </a>
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
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">All Admins ({{$adminCount}})</h4>
                </div>
              </div>

              <div class="card-body p-0">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="users-table-body">
                        @php($count = 1)
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$admin->firstName ." ". $admin->lastName}}</td>
                                <td>{{$admin->username}}</td>
                                <td>{{$admin->role}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                    @if($admin->status == 'Active')
                                        <span class="badge badge-success bg-success">Active</span>
                                    @else
                                        <span class="badge badge-danger bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{$admin->created_at}}</td>
                                <td>
                                    <a href="{{ route('admin.admins.edit', [$admin->id])}}" class="btn btn-primary px-2" >
                                      <i class="fa fa-edit small"></i>
                                    </a>
                                </td>
                            </tr>
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
function editAdmin(id, firstName, lastName, username, role, email, phone, status) {
  // set the values in the modal
  document.getElementById('editAdminId').value = id;
  document.getElementById('editFirstName').value = firstName;
  document.getElementById('editLastName').value = lastName;
  document.getElementById('editUsername').value = username;
  document.getElementById('editRoleOption').label = role;
  document.getElementById('editEmail').value = email;
  document.getElementById('editPhone').value = phone;
  document.getElementById('editStatusOption').label = status;
    // alert(status);
  // open the modal
  const modal = new bootstrap.Modal(document.getElementById('editAdminModal'));
    modal.show();
}
</script>
@endpush

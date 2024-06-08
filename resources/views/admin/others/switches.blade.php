@extends('layout.admin.adminLayout')
@section('title', 'Service Category Switches')
@php( $page = 'switches')
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
                              <h1>Service Category Switches</h1>
                              <p>Switch for all service categories on the platform</p>
                            </div>    
                            <div>
                                {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#addServiceModal" class="btn btn-link btn-soft-light">
                                    <i class="fa fa-plus"></i>
                                    Service
                                </a>                   --}}
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
                  <h4 class="card-title">Services Switches</h4>
                </div>
              </div>
  
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Service</th>
                          <th>Category</th>
                          <th>MTN</th>
                          <th>AIRTEL</th>
                          <th>9MOBILE</th>
                          <th>GLO</th>
                          <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody id="users-table-body">
                        @php($count = 1)
                        @foreach($switches as $switch)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$switch->service}}</td>
                                <td>{{$switch->category}}</td>
                                
                                <td>
                                    @if($switch->mtn == 'Active')                                    
                                        <a type="button" class="btn btn-success activate-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'mtn', 'Inactive')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @else
                                        <a type="button" class="btn btn-warning delete-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'mtn', 'Active')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    @endif  
                                </td>
                                <td>
                                    @if($switch->airtel == 'Active')                                    
                                        <a type="button" class="btn btn-success activate-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'airtel', 'Inactive')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @else
                                        <a type="button" class="btn btn-warning delete-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'airtel', 'Active')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    @endif  
                                </td>
                                <td>
                                    @if($switch->mobile == 'Active')                                    
                                        <a type="button" class="btn btn-success activate-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'mobile', 'Inactive')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @else
                                        <a type="button" class="btn btn-warning delete-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'mobile', 'Active')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    @endif  
                                </td>
                                <td>
                                    @if($switch->glo == 'Active')                                    
                                        <a type="button" class="btn btn-success activate-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'glo', 'Inactive')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @else
                                        <a type="button" class="btn btn-warning delete-btn btn-sm py-1 p-2" onclick="switchService({{$switch->id}}, 'glo', 'Active')" data-delivery-id="{{$switch->id}}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    @endif  
                                </td>
                                <td>{{$switch->updated_at}}</td>
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
    @include('components.user.footer')
</main>

@push('script2')
<script>

</script>
<script src="{{ asset('admin/js/switch.js') }}"></script>
@endpush

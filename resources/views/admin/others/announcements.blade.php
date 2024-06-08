@extends('layout.admin.adminLayout')
@section('title', 'Announcements')
@php( $page = 'announcements')
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
                              <h1>Announcements</h1>
                                <p>All Announcements</p>
                            </div>
                            <div>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal" class="btn btn-link btn-soft-light">
                                    <i class="fa fa-bell"></i>
                                    New Announcement
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
              <div class="card-header col-md-12">
                <div class="header-title">
                  <h4 class="card-title">Announcements</h4>
                </div>
              </div>
              <div class="card-body p-3">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="wallet-table-body">
                        @php($count =1)
                        @foreach($announcements as $announcement)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$announcement->title}}</td>
                            <td>{{$announcement->status}}</td>
                            <td>{{$announcement->created_at}}</td>
                            <td>
                                <a href="{{route('admin.showAnnouncement',[$announcement->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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


    <!-- Modal -->
    <!-- add announcement modal -->
    <div class="modal" id="addAnnouncementModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
              <h2>Add Announcement</h2>
                <form method="POST" action="{{route('admin.addAnnouncement')}}">
                    @csrf
                    <label for="amount">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required/>
                    <label for="amount">Body:</label>
                    <textarea name="body" class="form-control" required></textarea>
                    
                    <button type="submit" class="btn btn-primary m-3">Submit</button>
                    <button type="button" class="btn btn-secondary m-3" data-dismiss="modal" onclick="closeModal2('addAnnouncementModal')">Close</button>
                </form>
            </div>
            
  
            <!-- Modal footer -->
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
  
      <!-- edit announcement modal -->
      <div class="modal" id="editAnnouncementModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
              <h2>Edit Announcement</h2>
              <form id="editAnnouncementForm">
                <label for="amount">Title:</label>
                <input type="text" id="editAnnouncementTitle" name="title" class="form-control" />
                <input type="hidden" id="editAnnouncementId" name="announcementId" class="form-control" />
                <label >Body:</label>
                <textarea id="editAnnouncementBody" name="body" class="form-control"></textarea>
            </div>
            </form>
  
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal('editAnnouncementModal')">Close</button>
              <button type="button" class="btn btn-primary" onclick="updateAnnouncement(event)">Update</button>
            </div>
          </div>
        </div>
      </div>
  
      <!-- view announcement modal -->
      <div class="modal" id="viewAnnouncementModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3>View Announcement</h3>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <h5>Title : <span id="viewAnnouncementTitle"></span></h5>
              <p>Body : <span id="viewAnnouncementBody"></span></p>
              <p>Status : <span id="viewAnnouncementStatus"></span></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal('viewAnnouncementModal')">Close</button>
            </div>
          </div>
        </div>
      </div> 
  
@push('script2')
<script>
</script>
@endpush

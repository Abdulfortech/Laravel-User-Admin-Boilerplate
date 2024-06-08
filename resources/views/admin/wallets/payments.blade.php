@extends('layout.admin.adminLayout')
@section('title', 'Wallet Payments')
@php( $page = 'wallets')
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
                              <h1>{{auth()->user()->username}}'s Wallet Fundings</h1>
                                <p>Wallet Funding History</p>
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
                  <h4 class="card-title">All Payments ({{$paymentCounts}})</h4>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Channel</th>
                            <th>Reference</th>
                            <th>Balance Before</th>
                            <th>Amount</th>
                            <th>Balance After</th>
                            <th>Status</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php($count = 1)
                      @foreach($payments as $payment)
                      <tr>
                        <th>{{$count}}</th>
                        <th>{{$payment->channel}}</th>
                        <th>{{$payment->reference}}</th>
                        <th>&#8358; {{number_format($payment->balanceBefore)}}</th>
                        <th>&#8358; {{number_format($payment->amount)}}</th>
                        <th>&#8358; {{number_format($payment->balanceAfter)}}</th>
                        <th>{{$payment->status}}</th>
                        <th>{{$payment->created_at}}</th>
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

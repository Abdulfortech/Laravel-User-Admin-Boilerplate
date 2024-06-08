@extends('layout.admin.appLayout')
@section('title', 'Packages')
@php( $page = 'packages')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="container text-center"><h2 class="text-white">Packages</h2></div>
      <div class="row" id="viewproductInfo">
        <div class="col-md-9 mx-auto">
          <div class="card mb-4">
            <div class="card-header text-center pb-0">
                    <i class="fa fa-briefcase" style="font-size: 80px"></i>
              <h4 class="text-center">Package Information</h4>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Title : </b> {{$package->title}}
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Price : </b> &#8358; {{number_format($package->wholesalePrice, 2, '.', ',')}}
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Description : </b> {{$package->description}}
                            </li>
                        </ol>
                    </div>
                    
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Status : </b> {{$package->status}}
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Created On : </b> <span id="middleName">{{$package->created_at}}</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Last Update : </b> {{$package->updated_at}}
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Added By : </b> <span id="middleName">{{isset($package->adminID)?$package->admin->username:'unknown'}}</span>
                            </li>
                        </ol>
                    </div>
                </div>
                <center>
                    <a href="{{route('admin.packages.edit',[$package->id])}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                    @if($package->status == 'Active')
                    <a href="{{route('admin.packages.deactivate',[$package->id])}}" class="btn btn-warning"><i class="fa fa-arrow-up"></i> Deactivate</a>
                    @else
                    <a href="{{route('admin.packages.activate',[$package->id])}}" class="btn btn-success"><i class="fa fa-arrow-down"></i> Activate</a>
                    @endif
                    <a href="{{route('admin.packages.delete',[$package->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    {{-- <a href="{{route('products.print',[$package->id])}}" class="btn btn-primary"><i class="fa fa-print"></i> Print</a> --}}
                </center>
            </div>
          </div>
        </div>
      </div>
      @include('components.admin.footer')
    </div>
  </main>
  @push('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script>
      function printContent(el) {
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            window.location.reload(true);
      }

      document.getElementById('btnPrint').addEventListener('click',
            Export);

        function Export() {
            html2canvas(document.getElementById('viewproductInfo'), {
                onrendered: function(canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("AARasheedData-Funding.pdf");
                }
            });
        }

  </script>
@endpush
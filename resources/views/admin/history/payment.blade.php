<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.adminLayout')
@section('title', 'View Payment')
@php( $page = 'payments')
@section('contents')
@include('components.admin.sidebar')
<main class="main-content">
    <div class="position-relative iq-banner">
        <!--Nav Start-->
        @include('components.admin.navbar')
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-md-6 mx-auto py-5" >
                <div id="viewOrderInfo">
                    <div class="card border mt-5">
                        <div class="card-header ">
                            <div class="header-title text-center">
                                <img class="rounded-circle" src="{{ asset('app/assets/images/logos/aarasheeddata2.png') }}" width="80" height="80">
                                <h4 class="card-title text-center">Payment Details</h4>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group list-group-flush">
                                @if(isset($payment))
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Reference:</b> <span id="total">{{$payment->reference}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Gateway:</b><span id="total">{{$payment->gateway}}</span>
                                        </div>
                                        <div>
                                            <b>Channel:</b> <span id="total">{{$payment->channel}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Amount:</b> &#8358; <span id="total">{{$payment->amount}}</span>
                                        </div>
                                        <div>
                                            <b>Fees:</b> &#8358;<span id="total">{{$payment->fees}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Total:</b> &#8358;<span id="total">{{number_format($payment->total, 2, '.', ',')}}</span>
                                        </div>
                                        <div>
                                            <b>Status:</b> <span >{{$payment->status}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Balance Before:</b> &#8358;<span>{{number_format($payment->balanceBefore, 2, '.', ',')}}</span>
                                        </div>
                                        <div>
                                            <b>Balance After:</b> &#8358;<span id="total">{{number_format($payment->balanceAfter, 2, '.', ',')}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Date:</b> <span>{{$payment->created_at}}</span>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <center>
                    <button class="btn btn-primary" onclick="printContent('viewOrderInfo');">Print</button>
                    <button class="btn btn-primary" id="btnPrint">Save</button>
                </center>
            </div>
        </div>
    </div>
    @include('components.admin.footer')
</main>
@push('script2')
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
            html2canvas(document.getElementById('viewOrderInfo'), {
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

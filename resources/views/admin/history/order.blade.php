<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.adminLayout')
@section('title', 'View Order')
@php( $page = 'orders')
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
                    <div class="card  border mt-5">
                        <div class="card-header ">
                            <div class="header-title text-center">
                                <img class="rounded-circle" src="{{ asset('app/assets/images/logos/aarasheeddata2.png') }}" width="80" height="80">
                                <h4 class="card-title text-center">Order Details</h4>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <b>Order Code:</b> <span id="code">{{$order->orderCode}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <b>Service:</b> <span id="type">{{$order->service}}</span>
                                    </div>
                                    <div>
                                        <b>Package:</b> <span id="code">{{$order->package->title}}</span>
                                    </div>
                                </li>
                                @if($order->service == 'Airtime')
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Beneficiary :</b> <span id="amount">{{$order->beneficiary}}</span>
                                        </div>
                                    </li>
                                @endif
                                @if($order->service == 'Data')
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>size:</b><span id="amount">{{$order->package->size}}</span>
                                        </div>
                                        <div>
                                            <b>Validity:</b> <span >{{$order->package->validity}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Beneficiary :</b> <span id="amount">{{$order->beneficiary}}</span>
                                        </div>
                                    </li>
                                @endif
                                @if($order->service == 'Data Card')
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>size:</b><span id="amount">{{$order->package->size}}</span>
                                        </div>
                                        <div>
                                            <b>Validity:</b> <span >{{$order->package->validity}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Pin :</b> <span id="amount">{{$order->token}}</span>
                                        </div>
                                    </li>
                                @endif
                                @if($order->service == 'Bulk SMS')
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Quantity:</b><span id="amount">{{$order->quantity}}</span>
                                        </div>
                                        <div>
                                            <b>SenderID:</b> <span >{{$order->smsSender}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Message:</b><span>{{$order->smsMessage}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Beneficiary :</b> <span id="amount">{{$order->beneficiary}}</span>
                                        </div>
                                    </li>
                                @endif
                                @if($order->service == 'Electricity')
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>DISCO : </b><span>{{$order->biller}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Meter Type : </b> <span >{{$order->tokenType}}</span>
                                        </div>
                                        <div>
                                            <b>Meter No. : </b><span id="amount">{{$order->tokenMeterNo}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Token : </b><span>{{$order->token}}</span>
                                        </div>
                                    </li>
                                @endif
                                @if($order->service == 'Cable')
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Biller : </b><span>{{$order->biller}}</span>
                                        </div>
                                        <div>
                                            <b>IUC No. : </b><span id="amount">{{$order->tokenMeterNo}}</span>
                                        </div>
                                    </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <b>Amount:</b> &#8358;<span id="amount">{{number_format($order->total, 2, '.', ',')}}</span>
                                    </div>
                                    <div>
                                        <b>Status:</b> <span >{{$order->status}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <b>Date:</b> <span >{{$order->created_at}}</span>
                                    </div>
                                </li>
                                @if(isset($order->transaction))
                                    <li class="list-group-item d-flex justify-content-center">
                                        <div class="text-center">
                                            <h4>Transaction Details</h4>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Note:</b> <span id="total">{{$order->transaction->note}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Type:</b><span id="total">{{$order->transaction->type}}</span>
                                        </div>
                                        <div>
                                            <b>Total Paid:</b> &#8358;<span id="total">{{number_format($order->transaction->amount, 2, '.', ',')}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Balance Before:</b> &#8358;<span>{{number_format($order->transaction->balanceBefore, 2, '.', ',')}}</span>
                                        </div>
                                        <div>
                                            <b>Balance After:</b> &#8358;<span id="total">{{number_format($order->transaction->balanceAfter, 2, '.', ',')}}</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <b>Status:</b> <span >{{$order->transaction->status}}</span>
                                        </div>
                                        <div>
                                            <b>Date:</b> <span>{{$order->transaction->created_at}}</span>
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
                    pdfMake.createPdf(docDefinition).download("AARasheedData-Order.pdf");
                }
            });
        }

  </script>
@endpush

<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.admin.appLayout')
@section('title', 'View Order')
@php( $page = 'orders')
@section('contents')
<div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.admin.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="container">
            <h2 class="text-center text-white">Order Information</h2>
        </div>
      <div class="row" id="viewproductInfo">
        <div class="col-md-10 mx-auto">
          <div class="card mb-4">
            <div class="card-header text-center pb-0">
              <h3 class="text-center">Order Information</h3>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h5 class="">Client Information</h5>
                        <h6>
                            <span class="fw-bold small">Name : {{$order->name}},</span><br>
                            <span class="fw-bold small">Phone : {{$order->phone}},</span><br>
                            <span class="fw-bold small">Address : {{$order->address}}.</span><br>
                            <span class="fw-bold small"> Created On : {{$order->created_at}}</span>
                        </h6>
                    </div>
                    <div class="col-md-6 col-12 text-end">
                        <h5 class="">Order Information</h5>
                        <h6>
                            <span class="fw-bold small">Order #ID : <b>{{$order->orderCode}}</b></span><br>
                            <spam class="fw-bold small"> Delivery Type : {{$order->deliveryType}}</spam><br>
                            <span class="fw-bold small">Order Status :
                                @if($order->status == 'Active')
                                    <span class="badge bg-primary p-1">Active</span>
                                @elseif($order->status == 'Pending')
                                    <span class="badge bg-secondary p-1">Pending</span>
                                @elseif($order->status == 'Completed')
                                    <span class="badge bg-success p-1">Completed</span>
                                @elseif($order->status == 'Canceled')
                                <span class="badge bg-danger p-1">Canceled</span>
                                @else
                                    <span class="badge bg-dark p-1">Unknown</span>
                                @endif
                            </span><br>
                            <span class="fw-bold small">Payment Status :
                                <span class="badge bg-info p-1">{{$order->paymentStatus}}</span>
                            </span>
                        </h6>
                    </div>
                    <div class="col-12 mt-4">
                        <h5 class="">Product</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count = 1)
                                {{-- @foreach($order->product as $item) --}}
                                    <tr>
                                        <td class="text-end">{{$count}}</td>
                                        <td >{{substr($order->product->title,0, 50)}}</td>
                                        <td class="text-end">{{$order->product->category}}</td>
                                        <td class="text-end">&#8358; {{number_format($order->product->price)}}</td>
                                    </tr>
                                    {{-- @php($count++) --}}
                                {{-- @endforeach --}}
                                <tr class="text-end fw-bolder" style="border-top: 2px solid #333;">
                                    <td colspan="3">Total Quantity :</td>
                                    <td class="text-end">{{number_format($order->quantity)}}</td>
                                </tr>
                                <tr class="text-end fw-bolder" style="border-top: 2px solid #333;">
                                    <td colspan="3">Sub Total :</td>
                                    <td class="text-end">&#8358; {{number_format($order->subtotal)}}</td>
                                </tr>
                                <tr class="text-end fw-bolder">
                                    <td colspan="3">Delivery :</td>
                                    <td class="text-end">&#8358; {{number_format($order->delivery)}}</td>
                                </tr>
                                <tr class="text-end fw-bolder">
                                    <td colspan="3">Total :</td>
                                    <td class="text-end">&#8358; {{number_format($order->total)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="col-12 mt-4">
                        <h5 class="">Transactions</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count = 1)
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td class="">{{$count}}</td>
                                        <td >{{$transaction->type}}</td>
                                        <td class="">&#8358; {{number_format($transaction->amount)}}</td>
                                        <td class="">{{$transaction->method}}</td>
                                        <td class=""><span class="badge bg-primary">{{$transaction->status}}</span></td>
                                        <td class="">{{$transaction->created_at}}</td>
                                    </tr>
                                    @php($count++)
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}

                </div>
                <hr>
                {{-- <div class="row mb-5">
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Created On : </b> <span id="middleName">{{$order->created_at}}</span>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <b>Added By : </b> <span id="middleName">{{isset($order->added_by)?$order->user->username:'unknown'}}</span>
                            </li>
                        </ol>
                    </div>
                </div> --}}
                <center>
                    @if($order->status = 'Active' && $order->paymentStatus = 'Paid' )
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deliveryModal" class="btn btn-primary"><i class="fa fa-credit-card"></i> Delivered</button>
                        {{-- <a href="{{route('admin.orders.completed',[$order->id])}}" class="btn btn-info"> Completed</a> --}}
                    @endif

                    @if($order->status != 'Completed' && $order->status != 'Canceled' && $order->paymentStatus != 'Paid')
                        <button type="button" data-bs-toggle="modal" data-bs-target="#paymentModal" class="btn btn-primary"><i class="fa fa-credit-card"></i> Payment</button>
                    @endif
                    @if($order->status != 'Canceled')
                        <button type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</button>
                    @endif
                    {{-- <a href="{{route('orders.receipt',[$order->id])}}" class="btn btn-info"><i class="fa fa-print"></i> Print</a> --}}
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    {{-- <a href="{{route('products.showEdit',[$product->id])}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                    @if($product->status == 'Active')
                    <a href="{{route('products.deactivate',[$product->id])}}" class="btn btn-warning"><i class="fa fa-arrow-up"></i> Deactivate</a>
                    @else
                    <a href="{{route('products.activate',[$product->id])}}" class="btn btn-success"><i class="fa fa-arrow-down"></i> Activate</a>
                    @endif
                    <button class="btn btn-primary" onclick="printContent('viewproductInfo');">Print</button>
                    <button class="btn btn-primary" id="btnPrint">Save</button> --}}
                </center>
            </div>
          </div>
        </div>
      </div>
      @include('components.admin.footer')
    </div>
  </main>

  {{-- <div class="modal" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Order</h4>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal">
                    <i class="fa fa-times" style="font-size:20px;"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="addClientForm" action="{{route('orders.delete',[$order->id])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <p>Are you sure you want to delete? if yes, it is going to be deleted together with payment records.</p>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary" id="addClientButton">Delete</button>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger" id="addClientButton">Cancel</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
  </div> --}}

  {{-- <div class="modal" id="cancelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cancel Order</h4>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal">
                    <i class="fa fa-times" style="font-size:20px;"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="addClientForm" action="{{route('orders.cancel', [$order->id])}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Reason for Canceling</label>
                                <textarea class="form-control" name="reason" id="reason" required></textarea>
                                @error('reason')
                                <span class="text-danger small">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary" id="addClientButton">Submit</button>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger" id="addClientButton">Cancel</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
  </div> --}}
  {{-- payment modal --}}
  <div class="modal" id="paymentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Order Payment</h4>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal">
                    <i class="fa fa-times" style="font-size:20px;"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="addClientForm" action="{{route('admin.orders.payment', [$order->id])}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="">Order ID</label>
                            <input class="form-control" type="text" name="orderCode" id="total" value="{{$order->orderCode}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Sub Total(&#8358;)</label>
                            <input class="form-control" type="number" name="subtotal" id="oldBalance" value="{{$order->subtotal}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Delivery(&#8358;)</label>
                            <input class="form-control" type="number" name="delivery" id="amount" value="{{$order->delivery}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Total(&#8358;)</label>
                            <input class="form-control" type="number" name="total" id="amount" value="{{$order->total}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Payment Method</label>
                            <select class="form-control" name="method" id="method" required>
                                <option value="">Choose Payment Method</option>
                                <option>Cash</option>
                                <option>Bank Transfer</option>
                            </select>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary" id="addClientButton">Submit</button>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger" id="addClientButton">Cancel</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
  </div>

  <div class="modal" id="deliveryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Order Payment</h4>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal">
                    <i class="fa fa-times" style="font-size:20px;"></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="addClientForm" action="{{route('admin.orders.delivery', [$order->id])}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="">Order ID</label>
                            <input class="form-control" type="text" name="orderCode" id="total" value="{{$order->orderCode}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Delivered By</label>
                            <input class="form-control" type="text" name="deliveredBy" id="oldBalance" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Delivery Date(&#8358;)</label>
                            <input class="form-control" type="date" name="deliveredAt" id="amount"  required>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary" id="addClientButton">Submit</button>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-danger" id="addClientButton">Cancel</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
  </div>


  @push('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script>
    // function printContent(el) {
    //     var restorepage = $('body').html();
    //     var printcontent = $('#' + el).clone();
    //     $('body').empty().html(printcontent);
    //     window.print();
    //     window.location.reload(true);
    // }

    //   document.getElementById('btnPrint').addEventListener('click',Export);

    // function Export() {
    //     html2canvas(document.getElementById('viewproductInfo'), {
    //         onrendered: function(canvas) {
    //             var data = canvas.toDataURL();
    //             var docDefinition = {
    //                 content: [{
    //                     image: data,
    //                     width: 500
    //                 }]
    //             };
    //             pdfMake.createPdf(docDefinition).download("AARasheedData-Funding.pdf");
    //         }
    //     });
    // }
    const amount = document.getElementById('amount');

    // amount.addEventListener('input', () => {
    //     calculateBalance(amount.value);
    // });
    // function calculateBalance (amount)
    // {
    //     // get the inputs
    //     const total = document.getElementById('total');
    //     const deposit = document.getElementById('deposit');
    //     const oldBalance = document.getElementById('oldBalance');
    //     const newBalance = document.getElementById('newBalance');
    //     const status = document.getElementById('status');
    //     // get the values
    //     var totalAmount = total.value;
    //     var depositAmount = total.value;
    //     var oldBalanceAmount = total.value;

    //     var newBalanceAmount = oldBalanceAmount - amount;


    // }
    function formatNumber(number) {
            return new Intl.NumberFormat().format(number);
        }

  </script>
@endpush

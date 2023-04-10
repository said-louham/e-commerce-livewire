@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                      <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                        <a href="{{url('order')}}" class="btn btn-danger btn-sm float-end">Back</a>
                      </h4>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id:{{$order->id}}</h6>
                            <h6>Tracking No:{{$order->tracking_no}}</h6>
                            <h6>Order Created Date:{{$order->created_at->format('d-m-Y h:i A')}}</h6>
                            <h6>Payment Mode:{{$order->payment_mode}}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Mesaage: <span class="text-uppercase">{{$order->status_message}}</span>
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name:{{$order->fullname}}</h6>
                            <h6>Email:{{$order->email}}</h6>
                            <h6>Phone:{{$order->phone}}</h6>
                            <h6>Adress:{{$order->address}}</h6>
                            <h6>Pin code:{{$order->pincode}}</h6>
                          
                        </div>
                      </div>
                      <h5>Order items</h5>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordred table-striped">
                            <thead>
                                <th>Item ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>

                            <tbody>
                                @php
                                    $totalPrice=0
                                @endphp
                                @forelse ($order->orderItems as $item)
                                    <tr>
                                        <th width="10%">{{$item->id}}</th>
                                        <th>
                                            @if ($item->product->productImages)
                                            <img src={{asset($item->product->productImages[0]->image)}} alt={{$item->product->name}} width="50px" height="50px">
                                            @else
                                            <img src="" alt="" width="100px">
                                            @endif
                                        </th>
                                        <th>{{$item->product->name}}
                                            <br>
                                            @if($item->product->productColor)
                                            -Color: <span>{{$item->productColor->color->name}}</span>
                                            @endif
                                        </th>
                                        <th  width="10%">{{$item->price}}</th>
                                        <th  width="10%">{{$item->quantity}}</th>
                                        <th  width="10%" class="fw-blod">${{$item->quantity * $item->price}}</th>
                                        @php
                                            $totalPrice+=$item->quantity * $item->price
                                        @endphp
                                    </tr>
                                @empty
                                    <tr>
                                        <td> No Orders Items </td>
                                    </tr>
                                @endforelse
                                <td colspan="5" class="fw-bold">Total Amount</td>
                                <td colspan="1" class="fw-blod">{{$totalPrice}}</td>
                            </tbody>
                        </table>

                        {{-- {{ $order->orderItems->links() }} --}}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
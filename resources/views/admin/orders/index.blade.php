@extends('layouts.admin')

@section('title', 'Home Page')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <h4 class="mb-4">
                            My Orders
                        </h4>
                        <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                            <div class="col-md-3">
                                    <label>Filter by Date</label>
                                    {{-- get the date from url and set the input value  --}}
                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d')}}"  class="form-controll">
                            </div>
                           <div class="col-md-3">
                               <label>Filter by Status</label>
                                        <select name="status" class="form-select">
                                            <option value="in progress" {{Request::get('status')=='in progress'?  'selected':  ''}}>In progress</option>
                                            <option value="completed" {{Request::get('status')=='completed'?  'selected':  ''}}>Completed</option>
                                            <option value="pending" {{Request::get('status')=='pending'?  'selected':  ''}}>Pending</option>
                                            <option value="cancelled" {{Request::get('status')=='cancelled'?  'selected':  ''}}>Cancelled</option>
                                            <option value="out-for-delevery" {{Request::get('status')=='out-for-delevery'?  'selected':  ''}}>Out for delivery</option>
                                        </select>
                           </div>
                            <div class="col-md-6">
                                   <button class="btn btn-primary mt-4"> Filter</button>
                           </div>
                        </div>
                        </form>
                             
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordred table-striped">
                                <thead>
                                    <th>Order ID</th>
                                    <th>Tracking No</th>
                                    <th>username</th>
                                    <th>Payment Mode</th>
                                    <th>Orderd Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>

                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $item->status_message }}</td>
                                            <td>
                                                <a href={{ url('admin/order/' . $item->id) }}
                                                    class="btn btn-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td> No Orders available </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>














@endsection

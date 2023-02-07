@extends('layouts.admin')

@section('title', 'Orders List')
@section('content-header', 'Order List')
@section('content-actions')
    <a href="{{route('orders.create')}}" class="btn btn-primary">Create Order</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order id</th>
                    <th>Customer Name</th>
                    <th>Phone Number </th>
                    <th>Net Amount</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->id}}</td>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->phone_number}}</td>
                    <td>{{$order->total_amount}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary"><i
                                class="fas fa-edit"></i></a>
                        
                                <a href="{{ route('orders.destory', $order->id) }}" class="btn btn-danger btn-delete"><i
                                class="fas fa-trash"></i></a>
                        
                    <a href="{{ route('orders.invoice', $order) }}" class="btn btn-danger btn-invoice"><i
                                class="fas fa-file-invoice"></i></a>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  
    </div>
</div>
@endsection


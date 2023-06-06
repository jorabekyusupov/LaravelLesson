@extends('layouts.admin')
@section('title','Orders')
@section('content')
    <div class="row">
        <div class="col-12">


            <div class="d-flex align-items-center justify-content-between">
                <h1>Orders</h1>
                <div class="col-5">
                    <form action="{{route('orders.products')}}" method="get" class="d-flex align-items-center justify-content-between" style="border: 1px solid white; padding: 10px" >
                        <div class="form-group">

                            <input type="text" name="product" class="form-control" placeholder="Search">
                        </div>
                        <div class="form-group">

                            <button class="btn btn-primary" type="submit">Submit</button>

                        </div>

                    </form>
                </div>
                <div>
                    <a href="{{route('orders.create')}}" class="btn btn-primary">Create</a>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Total_cost</th>
                    <th>Total_amount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->firstname ?? ''}}</td>
                        <td>{{$order->product->product->name ?? ''}}</td>
                        <td>{{$order->product->total_cost  ?? ''}}</td>
                        <td>{{$order->product->quantity  ?? ''}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>


            </table>
            <div class="">
                {!! $orders->links() !!}
            </div>
        </div>
    </div>
@endsection

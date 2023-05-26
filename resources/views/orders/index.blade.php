@extends('layouts.admin')
@section('title','Orders')
@section('content')
    <div class="row">
        <div class="col-12">


            <div class="d-flex align-items-center justify-content-between">
                <h1>Orders</h1>
                <div>
                    <a href="{{route('orders.create')}}" class="btn btn-primary">Create</a>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Street</th>
                    <th>Total_amount</th>
                    <th>Total_cost</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user_id}}</td>
                        <td>{{$order->street}}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>{{$order->total_cost}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->updated_at}}</td>
                        {{--<td> <div class="d-flex align-items-center m-1"><a href="{{route('users.edit', ['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('users.delete', ['id'=>$user->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-primary m-1" type="submit">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>--}}

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

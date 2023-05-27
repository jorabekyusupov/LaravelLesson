@extends('layouts.admin')
@section('title','Create Order')
@section('content')
    <div class="row">
        @if($errors->count() > 0)
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif
        <form action="{{route('orders.store')}}" method="post">
            {{csrf_field()}}

            <div class="row">
                <div class="col-12 row m-1">
                    <div class="form-group col-6">
                        <label for="name">Select Name:</label>
                        <select class="col-6" name="name" id="name">
                            @if(count($deliveries)>0)
                            @for($i=0; $i<count($deliveries); $i++)
                                <option value="{{ $deliveries[$i]['name'] }}">{{--{{ $deliveries[$i]['name'] }}--}}</option>
                                <input type="hidden" name="total_price" value="{{ $deliveries[$i]['price'] }}">
                                <input type="hidden" name="delivery_id" value="{{ $deliveries[$i]['id'] }}">
                            @endfor
                            @endif
                        </select><br>
                        <label for="name">Select Status:</label>
                        <select class="col-6" name="status" id="name">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                                @endforeach
                        </select><br>


                        <label for="user_id">Select User:</label>
                        <select class="col-6" name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->user_id }}</option>
                            @endforeach
                        </select><br>
                        <label for="region_id">Select Region:</label>
                        <select class="col-6" name="region_id" id="region_id">
                            @foreach($regions as $region)
                                <option>{{ $region->region_id }}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="address_id">Select Address:</label>
                        <select class="col-6" name="address_id" id="address_id">
                            @foreach($addresses as $address)
                                <option>{{ $address->address_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success ">Submit</button>
                    </div>

                </div>
            </div>

        </form>
    </div>
@endsection


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
                        <label for="user_id">Select User:</label>
                        <select name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

        </form>
    </div>
@endsection


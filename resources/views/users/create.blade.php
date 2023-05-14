@extends('layouts.admin')
@section('title','Create User')
@section('content')
    <div class="row">
        @if($errors->count() > 0)
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif
        <form action="{{route('users.store')}}" method="post">
        {{csrf_field()}}

            <div class="row">
                <div class="col-12 row m-1">
                    <div class="form-group col-6">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                    </div>

                </div>
                <div class="col-12 row m-1">
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>

                </div>
                <div class="col-12 row m-1">
                    <div class="form-group ">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>


                </div>
                <div class="col-12 row m-1 ">
                    <div class="form-group text-end">
                       <button type="submit" class="btn btn-success ">Submit</button>
                    </div>


                </div>
            </div>

        </form>
    </div>
@endsection

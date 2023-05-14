@extends('layouts.admin')
@section('title','Users')
@section('content')
    <div class="row">
        <div class="col-12">


                <div class="d-flex align-items-center justify-content-between">
                    <h1>Users</h1>
                    <a href="{{route('users.create')}}" class="btn btn-primary">Create</a>
                </div>

            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>



            </table>
            <div class="">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection

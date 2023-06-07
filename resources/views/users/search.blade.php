@extends('layouts.admin')
@section('title','Users')
@section('content')
    <div class="row">
        <div class="col-12">


            <div class="d-flex align-items-center justify-content-between">
                <h1>Users</h1>
                <div class="col-5">
                    <form action="{{route('users.search')}}" method="get" class="d-flex align-items-center justify-content-between" style="border: 1px solid white; padding: 10px" >
                        <div class="form-group">

                            <input type="text" name="query" class="form-control" placeholder="Search">
                        </div>
                        <div class="form-group">

                            <button class="btn btn-primary" type="submit">Submit</button>

                        </div>

                    </form>
                </div>
                <div>
                    <a href="{{route('users.create')}}" class="btn btn-primary">Create</a>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Phone</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td> <div class="d-flex align-items-center m-1"><a href="{{route('users.edit', ['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('users.delete', ['id'=>$user->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-primary m-1" type="submit">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>

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


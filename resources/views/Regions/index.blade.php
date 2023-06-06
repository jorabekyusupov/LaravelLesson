@extends('layouts.admin')
@section('title','Regions')
@section('content')
    <div class="row">
        <div class="col-12">


            <div class="d-flex align-items-center justify-content-between">
                <h1>Regions</h1>
                <div>
                    <a href="{{route('regions.create')}}" class="btn btn-primary">Create</a>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($regions as $region)
                    <tr>
                        <td>{{$region->id}}</td>
                        <td>{{$region->name}}</td>
                        <td>{{$region->slug}}</td>
                        <td>{{$region->created_at}}</td>
                        <td>{{$region->updated_at}}</td>
                        <td> <div class="d-flex align-items-center m-1"><a href="{{route('regions.edit', ['id'=>$region->id])}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('regions.delete', ['id'=>$region->id])}}" method="post">
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
                {!! $regions->links() !!}
            </div>
        </div>
    </div>
@endsection


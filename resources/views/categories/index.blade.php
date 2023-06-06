@extends('layouts.admin')
@section('title','Categories')
@section('content')
    <div class="row">
        <div class="col-12">


            <div class="d-flex align-items-center justify-content-between">
                <h1>Categories</h1>
                <div>
                    <a href="{{route('categories.create')}}" class="btn btn-primary">Create</a>
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td> <div class="d-flex align-items-center m-1"><a href="{{route('categories.edit', ['id'=>$category->id])}}" class="btn btn-primary">Edit</a>
                                <form action="{{route('categories.delete', ['id'=>$category->id])}}" method="post">
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
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection

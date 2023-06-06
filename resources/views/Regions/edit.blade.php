@extends('layouts.admin')
@section('title','Regions edit')
@section('content')
    <div class="row">
        @if($errors->count() > 0)
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif
        <form action="{{route('regions.update',['id'=>$regions->id])}}" method="post">
            @method('PUT')
            {{csrf_field()}}

            <div class="row">
                <div class="col-12 row m-1">
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{$regions->name}}" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{$regions->slug}}" class="form-control">
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



@extends('layouts.admin')
@section('title','Products')
@section('content')
    <div class="row">
        <div class="col-12">


            <div class="d-flex align-items-center justify-content-between">
                <h1>Products</h1>
                <form action="{{ route('products.index') }}" method="GET">
                    <select name="sort">
                        <option value="asc">Sort A to Z</option>
                        <option value="desc">Sort Z to A</option>
                    </select>
                    <button type="submit">Sort</button>
                </form>

               {{-- <form action="{{ route('products.show',['id' => $products   ->id]) }}" method="GET">
                    @method('find')
                    @csrf
                    <input type="text" name="id" placeholder="Enter ID">
                    <button type="submit">Show Product</button>
                </form>--}}
              {{--  <form action="{{ route('products.page') }}" method="GET">
                    <select name="perPage" onchange="this.form.submit()">
                        <option value="10" {{ $products->perPage() == 10 ? 'selected' : '' }}>10 per page</option>
                        <option value="15" {{ $products->perPage() == 15 ? 'selected' : '' }}>15 per page</option>
                        <option value="20" {{ $products->perPage() == 20 ? 'selected' : '' }}>20 per page</option>
                    </select>
                </form>--}}
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Store</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name ?? '' }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->store->name ?? '' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="">
                {!! $products->links() !!}
            </div>
            <div>
            <form action="{{ route('products.page') }}" method="GET">
                <select name="perPage" onchange="this.form.submit()">
                    <option value="10" {{ $products->perPage() == 10 ? 'selected' : '' }}>10 per page</option>
                    <option value="15" {{ $products->perPage() == 15 ? 'selected' : '' }}>15 per page</option>
                    <option value="20" {{ $products->perPage() == 20 ? 'selected' : '' }}>20 per page</option>
                 </select>
            </form>

            </div>

        </div>
    </div>
@endsection


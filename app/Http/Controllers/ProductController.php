<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $sort = $request->input('sort', 'asc');

        $products = Product::query()
            ->select(['categories.name as category', 'stores.name as store', 'products.name', 'products.id','products.quantity as quantity','products.price as price'])
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('stores', 'products.store_id', '=', 'stores.id')
            ->orderByDesc('id', $sort)
            ->paginate(15);
        return view('products.index', compact(['products']));
    }
    public function show(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        return view('products.show', compact('product'));
    }
    protected function page(Request $request)
    {
        $perPage = $request->input('perPage', 10);

        $products = Product::paginate($perPage);

        return view('products.index', compact('products'));
    }
}


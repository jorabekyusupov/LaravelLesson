<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function OrderProductsIndex(Request $request)
    {
//        $orders = Order::query()
//            ->select(['orders.id as order_id', 'users.firstname as user', 'products.name as product', 'order_products.total_cost as total_cost', 'order_products.amount as quantity'])
//            ->leftJoin('order_products', 'order_products.order_id', '=', 'orders.id')
//            ->leftJoin('products', 'products.id', '=', 'order_products.product_id')
//            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
//            ->when($request->filled('product') && !empty($request->get('product')), function ($query) use ($request){
//               $query->where('products.name', 'like', '%'.$request->get('product').'%');
//            })
//            ->orderByDesc('orders.id')
//            ->paginate(15);
//dd($orders);

        $orders = Order::query()
            ->with(['product:order_id,product_id,total_cost,amount', 'product.product:id,name' ,'user:firstname,id'])
            ->when($request->filled('product') && !empty($request->get('product')), function ($query) use ($request){
                $query->whereHas('product.product', function ($query) use ($request){
                    $query->where('name', 'like', '%'.$request->get('product').'%');
                });
            })
            ->paginate(15);
        return view('orders.products', compact('orders'));
    }

}

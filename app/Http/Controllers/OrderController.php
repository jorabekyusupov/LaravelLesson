<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function OrderProductsIndex(Request $request)
    {
//        $orders = Order::query()
//            ->select(['orders.id as order_id', 'users.firstname as user', 'products.name as products', 'order_products.total_cost as total_cost', 'order_products.amount as quantity'])
//            ->leftJoin('order_products', 'order_products.order_id', '=', 'orders.id')
//            ->leftJoin('products', 'products.id', '=', 'order_products.product_id')
//            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
//            ->when($request->filled('products') && !empty($request->get('products')), function ($query) use ($request){
//               $query->where('products.name', 'like', '%'.$request->get('products').'%');
//            })
//            ->orderByDesc('orders.id')
//            ->paginate(15);
//dd($orders);

        $orders = Order::query()
            ->with(['products:order_id,product_id,total_cost,amount', 'products.products:id,name' ,'user:firstname,id'])
            ->when($request->filled('products') && !empty($request->get('products')), function ($query) use ($request){
                $query->whereHas('products.products', function ($query) use ($request){
                    $query->where('name', 'like', '%'.$request->get('products').'%');
                });
            })
            ->paginate(15);
        return view('orders.products', compact('orders'));
    }

}

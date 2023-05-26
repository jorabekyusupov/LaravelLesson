<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->select(['id', 'firstname','lastname', 'phone', 'created_at', 'updated_at'])
            ->orderByDesc('id')
            ->paginate(25);
//        return view('users', ['users' => $users]);
        return view('users.index', compact(['users']));
    }
    protected function index_order()
    {
        $orders = Order::query()
            ->select(['id','user_id','street','total_amount','total_cost', 'created_at', 'updated_at'])
            ->orderByDesc('id')
            ->paginate(15);
        return view('orders.index', compact(['orders']));
    }

    public function create()
    {
        return view('users.create');
    }
    public function create_order()
    {
        $users = User::query()
            ->select('user_id');
        $regions = Order::query()
            ->select('region_id');
        $addresses = Order::query()
            ->select('address_id');
        $deliveries = [
            [
                'id'=> 1,
                'name'=>'Express',
                'price'=>10000
            ],
            [
                'id'=> 2,
                'name'=>'Standard',
                'price'=>5000
            ]
        ];

        return view('orders.create', compact(['users', 'regions', 'deliveries', 'addresses' ]));
    }

    public function store_order(OrderCreateRequest $request)
    {
        $data = $request->validated();
        $order = [
            'user_id'=>$data['user_id'],
            'address_id'=>$data['address_id'],
            'delivery_id'=>$data['delivery_id'],
            'total_price'=>$data['total_price'],
            'status'=>$data['status']
        ];
        $orderModel = Order::query()->create($order);
        return redirect()->route('orders.index');
    }
    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        User::query()->create($request->all());
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $users = User::query()->find($id);
/*        return  response()->json($users);*/
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $data = User::query()->find($id);
        $data->update($request->all());
        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        $users = User::query()->findOrFail($id)->delete();
        return redirect()->route('users.index');

    }
}

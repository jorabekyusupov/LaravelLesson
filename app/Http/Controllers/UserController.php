<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\Order;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /* products
     *  1. Product lar royhatini Categories va storesga boglab chiqarish tovor id, product, category, price, quantity, magazin nomi
     *  2. product nomi category nomi  stores  nomi bo'yicha qidirish public papkani ichiga qaralsin
     *  3. narx va quantity boyicha tartiblash select 2 tablov qimmatlari va arzonlari, quantity uchun koplari va ozlarii  public papkani ichiga qaralsin
     *  4. productni id bo'yicha qidirish
     *  5. soni boyicha op kelish 10,20,50,100 ta public papkani ichiga qaralsin
     * */
    public function index(Request $request)
    {
        $users = User::query()
            ->select(['id', 'firstname', 'lastname', 'phone', 'created_at', 'updated_at'])
            ->when($request->filled('query'), function ($query) use ($request) {
                $query->where('firstname', 'like', '%' . $request->get('query') . '%')
                    ->orWhere('lastname', 'like', '%' . $request->get('query') . '%')
                    ->orWhere('phone', 'like', '%' . $request->get('query') . '%');
            })
            ->orderByDesc('id')
            ->paginate(25);
//        return view('users', ['users' => $users]);
        return view('users.index', compact(['users']));
    }

    protected function index_order()
    {
        $orders = Order::query()
            ->select(['id', 'user_id', 'street', 'total_amount', 'total_cost', 'created_at', 'updated_at'])
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
        $regions = Region::query()->whereNull('parent_id')->get();
        $users = User::query()->get();
        $statuses = [
            [
                'id' => 1,
                'name' => 'new'
            ],
            [
                'id' => 2,
                'name' => 'pending'
            ],
            [
                'id' => 3,
                'name' => 'confirmed'
            ]
        ];

        $deliveries = [
            [
                'id' => 1,
                'name' => 'Express',
                'price' => 10000
            ],
            [
                'id' => 2,
                'name' => 'Standard',
                'price' => 5000
            ]
        ];

        return view('orders.create', compact(['users', 'regions', 'deliveries', 'statuses']));
    }

    public function store_order(OrderCreateRequest $request)
    {
        $data = $request->validated();

        $order = [
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            'address_id' => $data['address_id'],
            'delivery_id' => $data['delivery_id'],
            'total_price' => $data['total_price'],
            'status' => $data['status']
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

    protected function search(Request $request)
    {
        $search_text = $request->input('query');
        $users = User::query()
            ->where(function ($query) use ($search_text) {
                $query->where('firstname', 'like', '%' . $search_text . '%')
                    ->orWhere('lastname', 'like', '%' . $search_text . '%')
                    ->orWhere('phone', 'like', '%' . $search_text . '%');
            })
            ->where('chat_id', '=', 1)
            ->paginate(10);

        return view('users.search', compact('users'));
    }
}

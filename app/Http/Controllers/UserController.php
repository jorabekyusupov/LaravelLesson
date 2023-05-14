<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->select(['id', 'firstname', 'phone', 'created_at', 'updated_at'])
            ->orderByDesc('id')
            ->paginate(25);

//        return view('users', ['users' => $users]);
        return view('users.index', compact(['users']));
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        User::query()->create($request->all());
        return redirect()->route('users.index');
    }
}

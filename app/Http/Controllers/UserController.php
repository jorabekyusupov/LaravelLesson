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
            ->select(['id', 'firstname','lastname', 'phone', 'created_at', 'updated_at'])
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

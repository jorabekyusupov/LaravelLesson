<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreate;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->select(['id', 'name','slug', 'created_at', 'updated_at'])
            ->orderByDesc('id')
            ->paginate(15);
        return view('categories.index', compact(['categories']));
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(CategoryCreate $request)
    {
        $data = $request->validated();
        Category::query()->create($request->all());
        return redirect()->route('categories.index');

    }
    public function delete($id)
    {
        $categories = Category::query()->findOrFail($id)->delete();
        return redirect()->route('categories.index');

    }
    public function edit($id)
    {
        $categories = Category::query()->find($id);
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::query()->find($id);
        $data->update($request->all());
        return redirect()->route('categories.index');
    }
}

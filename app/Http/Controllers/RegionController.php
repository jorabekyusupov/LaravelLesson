<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreate;
use App\Http\Requests\RegionCreateRequest;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::query()
            ->select(['id', 'name','slug', 'created_at', 'updated_at'])
            ->orderByDesc('id')
            ->paginate(15);
        return view('regions.index', compact(['regions']));
    }

    public function create()
    {
        return view('regions.create');
    }
    public function store(RegionCreateRequest $request)
    {
        $data = $request->validated();
        Region::query()->create($request->all());
        return redirect()->route('regions.index');

    }
    public function delete($id)
    {
        $regions = Region::query()->findOrFail($id)->delete();
        return redirect()->route('regions.index');

    }
    public function edit($id)
    {
        $regions = Region::query()->find($id);
        return view('regions.edit', compact('regions'));
    }

    public function update(Request $request, $id)
    {
        $data = Region::query()->find($id);
        $data->update($request->all());
        return redirect()->route('regions.index');
    }
}

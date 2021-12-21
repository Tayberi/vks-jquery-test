<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStudioRequest;
use App\Http\Requests\StoreStudioRequest;
use App\Http\Requests\UpdateStudioRequest;
use App\Models\Studio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudiosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('studio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studios = Studio::all();

        return view('admin.studios.index', compact('studios'));
    }

    public function create()
    {
        abort_if(Gate::denies('studio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studios.create');
    }

    public function store(StoreStudioRequest $request)
    {
        $studio = Studio::create($request->all());

        return redirect()->route('admin.studios.index');
    }

    public function edit(Studio $studio)
    {
        abort_if(Gate::denies('studio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studios.edit', compact('studio'));
    }

    public function update(UpdateStudioRequest $request, Studio $studio)
    {
        $studio->update($request->all());

        return redirect()->route('admin.studios.index');
    }

    public function show(Studio $studio)
    {
        abort_if(Gate::denies('studio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studio->load('studioEvents');

        return view('admin.studios.show', compact('studio'));
    }

    public function destroy(Studio $studio)
    {
        abort_if(Gate::denies('studio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studio->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudioRequest $request)
    {
        Studio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

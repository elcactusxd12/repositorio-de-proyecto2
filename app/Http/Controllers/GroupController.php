<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $groups = Group::paginate();

        return view('group.index', compact('groups'))
            ->with('i', ($request->input('page', 1) - 1) * $groups->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $group = new Group();

        return view('group.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Automatizar fecha de registro si no se envía o está vacía
        if (empty($data['fecha_registro'])) {
            $data['fecha_registro'] = now();
        }

        Group::create($data);

        return Redirect::route('groups.index')
            ->with('success', 'Grupo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $group = Group::findOrFail($id);

        return view('group.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $group = Group::findOrFail($id);

        return view('group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, Group $group): RedirectResponse
    {
        $data = $request->validated();

        // Automatizar fecha de registro al actualizar si viene vacía
        if (empty($data['fecha_registro'])) {
            $data['fecha_registro'] = $group->fecha_registro ?? now();
        }

        $group->update($data);

        return Redirect::route('groups.index')
            ->with('success', 'Grupo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Group::findOrFail($id)->delete();

        return Redirect::route('groups.index')
            ->with('success', 'Grupo eliminado exitosamente.');
    }
}
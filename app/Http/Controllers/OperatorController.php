<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OperatorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $operators = Operator::paginate();

        return view('operator.index', compact('operators'))
            ->with('i', ($request->input('page', 1) - 1) * $operators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $operator = new Operator();

        return view('operator.create', compact('operator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OperatorRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Automatizar fecha de registro si no se envía o está vacía
        if (empty($data['fecha_registro'])) {
            $data['fecha_registro'] = now();
        }

        Operator::create($data);

        return Redirect::route('operators.index')
            ->with('success', 'Operador creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $operator = Operator::find($id); // O Operator::where('id_operador', $id)->firstOrFail();
    
    // Fíjate bien si aquí mandas 'operator' o 'operador'
    return view('operator.show', compact('operator')); 
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $operator = Operator::findOrFail($id);

        return view('operator.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OperatorRequest $request, Operator $operator): RedirectResponse
    {
        $data = $request->validated();

        // Automatizar fecha de registro al actualizar si viene vacía
        if (empty($data['fecha_registro'])) {
            $data['fecha_registro'] = $operator->fecha_registro ?? now();
        }

        $operator->update($data);

        return Redirect::route('operators.index')
            ->with('success', 'Operador actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Operator::findOrFail($id)->delete();

        return Redirect::route('operators.index')
            ->with('success', 'Operador eliminado exitosamente.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use App\Models\Group;
use App\Models\Operator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Mostrar todos los contactos.
     */
    public function index(Request $request): View
    {
        $contacts = Contact::with([
            'company',
            'group',
            'operator'
        ])->paginate(20);

        return view('contact.index', compact('contacts'))
            ->with(
                'i',
                ($request->input('page', 1) - 1) * $contacts->perPage()
            );
    }

    /**
     * Mostrar formulario para registrar un contacto.
     */
    public function create(): View
    {
        $contact = new Contact();

        $companies = Company::all();
        $operators = Operator::all();
        $groups = Group::all();

        return view('contact.create', compact(
            'contact',
            'companies',
            'operators',
            'groups'
        ));
    }

    /**
     * Guardar un nuevo contacto.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create($request->validated());

        return Redirect::route('contacts.index')
            ->with('success', 'Contacto registrado exitosamente.');
    }

    /**
     * Mostrar información de un contacto.
     */
    public function show($id): View
    {
        $contact = Contact::with([
            'company',
            'group',
            'operator'
        ])->findOrFail($id);

        return view('contact.show', compact('contact'));
    }

    /**
     * Mostrar formulario para editar un contacto.
     */
    public function edit($id): View
    {
        $contact = Contact::findOrFail($id);

        $companies = Company::all();
        $operators = Operator::all();
        $groups = Group::all();

        return view('contact.edit', compact(
            'contact',
            'companies',
            'operators',
            'groups'
        ));
    }

    /**
     * Actualizar información del contacto.
     */
    public function update(
        ContactRequest $request,
        Contact $contact
    ): RedirectResponse {

        $contact->update($request->validated());

        return Redirect::route('contacts.index')
            ->with('success', 'Contacto actualizado exitosamente.');
    }

    /**
     * Eliminar un contacto.
     */
    public function destroy($id): RedirectResponse
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return Redirect::route('contacts.index')
            ->with('success', 'Contacto eliminado exitosamente.');
    }
}

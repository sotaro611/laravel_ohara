<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $contacts = ContactForm::select('id', 'name', 'title', 'gender', 'created_at')->get();
        //
        return view('contacts.index', compact('contacts', 'a'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //フォームから送られてきたデータ
        // dd($request->name);
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);

        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.properti.index', [
            'title' => 'Aplikasi Pendataan | Properti',
            'properties' => Property::latest()->get(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.properti.create', [
            'title' => 'Aplikasi Pendataan | Properti',
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'alamat' => 'required|max:255',
            'kota' => 'required|max:255',
            'harga' => 'required|max:255',
            'deskripsi' => 'required|max:255'
        ]);

        if ($request->file('foto')) {
            $namaFoto = $validated['nama'] . '.' . $request->file('foto')->extension();
            $validated['foto'] = $request->file('foto')->storeAs('dokumen/property', $namaFoto);
        }

        Property::create($validated);

        return redirect('/dashboard/properties')->with('success', 'Property has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('dashboard.properti.show', [
            'title' => 'Aplikasi Pendataan | Detail Data',
            'property' => $property,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('dashboard.properti.edit', [
            'title' => 'Aplikasi Pendataan | Edit Data',
            'property' => $property,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $rules = [
            'nama' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'alamat' => 'required|max:255',
            'kota' => 'required|max:255',
            'harga' => 'required|max:255',
            'deskripsi' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {

            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }

            $namaFoto = $validatedData['nama'] . '.' . $request->file('foto')->extension();
            $validatedData['foto'] = $request->file('foto')->storeAs('dokumen/property', $namaFoto);
        }

        Property::where('id', $property->id)->update($validatedData);

        return redirect('/dashboard/properties')->with('success', 'Property has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        if ($property->foto) {
            Storage::delete($property->foto);
        }

        $property->delete();

        return redirect('/dashboard/properties')->with('success', 'Property has been deleted');
    }
}

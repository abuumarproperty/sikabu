<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.dokumentasi.index', [
            'title' => 'Aplikasi Pendataan | Dokumentasi',
            'documentations' => Documentation::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dokumentasi.create', [
            'title' => 'Aplikasi Pendataan | Dokumentasi',
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'keterangan' => 'required|max:255'
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('dokumen/dokumentasi');
        }

        Documentation::create($validatedData);

        return redirect('/dashboard/documentation')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Documentation $documentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documentation $documentation)
    {
        return view('dashboard.dokumentasi.edit', [
            'title' => 'Aplikasi Pendataan | Dokumentasi',
            'documentation' => $documentation,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documentation $documentation)
    {
        $rules = [
            'judul' => 'required|max:255',
            'foto' => 'image|file|max:2048',
            'keterangan' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {

            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }

            $validatedData['foto'] = $request->file('foto')->store('dokumen/dokumentasi');
        }

        Documentation::where('id', $documentation->id)->update($validatedData);

        return redirect('/dashboard/documentation')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documentation $documentation)
    {
        if ($documentation->foto) {
            Storage::delete($documentation->foto);
        }

        $documentation->delete();

        return redirect('/dashboard/documentation')->with('success', 'Data has been deleted!');
    }
}

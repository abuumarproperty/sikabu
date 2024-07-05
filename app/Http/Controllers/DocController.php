<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('dashboard.surat-surat-umum.index', [
            'title' => 'Aplikasi Pendataan | Documents',
            'docs' => Doc::latest()->get(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.surat-surat-umum.create', [
            'title' => 'Aplikasi Pendataan | Documents',
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
            'dokumen' => 'mimes:pdf,doc,docx,xls,xlsx|file|max:2048',
            'keterangan' => 'required|max:255'
        ]);

        // $dokumen = $request->file('dokumen');

        // if ($dokumen) {
        //     $namaDokumen = $validatedData['judul'] . '-dokumen-' . time() . rand(1, 1000) . '.' . $dokumen->extension();
        //     $dokumen->storeAs('dokumen/docs', $namaDokumen);
        //     // $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen/docs');
        // }

        if ($request->file('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen/docs');
        }


        Doc::create($validatedData);

        return redirect('/dashboard/docs')->with('success', 'Document has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doc $doc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doc $doc)
    {
        return view('dashboard.surat-surat-umum.edit', [
            'title' => 'Aplikasi Pendataan | Documents',
            'doc' => $doc,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doc $doc)
    {
        $rules = [
            'judul' => 'required|max:255',
            'dokumen' => 'mimes:pdf,doc,docx,xls,xlsx|file|max:2048',
            'keterangan' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {

            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }

            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen/docs');
        }

        Doc::where('id', $doc->id)->update($validatedData);

        return redirect('/dashboard/docs')->with('success', 'Document has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doc $doc)
    {
        if ($doc->dokumen) {
            Storage::delete($doc->dokumen);
        }

        $doc->delete();

        return redirect('/dashboard/docs')->with('success', 'Document has been deleted!');
    }
}

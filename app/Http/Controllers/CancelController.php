<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Land;
use App\Models\Cancel;
use App\Models\Costumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CancelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.batal_mundur.index', [
            'title' => 'Aplikasi Pendataan | Batal atau Mundur',
            'cancels' => Cancel::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.batal_mundur.create', [
            'title' => 'Aplikasi Pendataan | Data Baru',
            'costumers' => Costumer::all(),
            'lands' => Land::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'costumer_id' => 'required',
            'no_surat_pembatalan' => 'required|max:255',
            'land_id' => 'required',
            'blok' => 'required|max:255',
            'kantor_pelayanan' => 'required|max:255',
            'tanggal_pembatalan' => 'required|date',
            'alasan_batal' => 'required|max:255',
            'jumlah_uang_yang_telah_disetor' => 'required|max:255',
            'nilai_pengembalian' => 'required|max:255',
            'dokumen_pembatalan' => 'file|max:2048'
        ]);

        if ($request->file('dokumen_pembatalan')) {
            $validatedData['dokumen_pembatalan'] = $request->file('dokumen_pembatalan')->store('dokumen/dokumen-pembatalan');
        }

        Cancel::create($validatedData);

        return redirect('/dashboard/cancels')->with('success', 'Data has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancel $cancel)
    {
        return view('dashboard.batal_mundur.show', [
            'title' => 'Aplikasi Pendataan | Detail',
            'cancel' => $cancel,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancel $cancel)
    {
        return view('dashboard.batal_mundur.edit', [
            'title' => 'Aplikasi Pendataan | Edit',
            'cancel' => $cancel,
            'costumers' => Costumer::all(),
            'lands' => Land::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cancel $cancel)
    {
        $rules = [
            'costumer_id' => 'required',
            'no_surat_pembatalan' => 'required|max:255',
            'land_id' => 'required',
            'blok' => 'required|max:255',
            'kantor_pelayanan' => 'required|max:255',
            'tanggal_pembatalan' => 'required|date',
            'alasan_batal' => 'required|max:255',
            'jumlah_uang_yang_telah_disetor' => 'required|max:255',
            'nilai_pengembalian' => 'required|max:255',
            'dokumen_pembatalan' => 'file|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen_pembatalan')) {

            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }

            $validatedData['dokumen_pembatalan'] = $request->file('dokumen_pembatalan')->store('dokumen/dokumen-pembatalan');
        }

        Cancel::where('id', $cancel->id)->update($validatedData);

        return redirect('/dashboard/cancels')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancel $cancel)
    {

        if ($cancel->dokumen_pembatalan) {
            Storage::delete($cancel->dokumen_pembatalan);
        }

        $cancel->delete();

        return redirect('/dashboard/cancels')->with('success', 'Data has been deleted!');
    }
}

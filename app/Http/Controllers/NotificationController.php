<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.notifikasi.index', [
            'title' => 'Aplikasi Pendataan | Notifikasi',
            'notifications' => Notification::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.notifikasi.create', [
            'title' => 'Aplikasi Pendataan | Tambah Notifikasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required|max:255',
        ]);

        Notification::create($validatedData);

        return redirect('/dashboard/notifications')->with('success', 'Notifikasi baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        return view('dashboard.notifikasi.edit', [
            'title' => 'Aplikasi Pendataan | Edit Notifikasi',
            'notification' => $notification
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required|max:255',
        ]);

        Notification::where('id', $notification->id)->update($validatedData);

        return redirect('/dashboard/notifications')->with('success', 'Notifikasi diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect('/dashboard/notifications')->with('success', 'Notifikasi dihapus');
    }
}

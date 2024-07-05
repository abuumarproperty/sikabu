<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog as Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.karyawan.index', [
            'title' => 'Aplikasi Pendataan | Register Karyawan',
            'employees' => User::all(),
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.karyawan.register.index', [
            'title' => 'Aplikasi Pendataan | Register Karyawan',
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validate = $request->validate([
            'name' => 'required|max:255',
            'avatar' => 'image|file|max:1024',
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'status' => 'required|max:255',
            // 'avatar' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        // $validate['password'] = bcrypt($validate['password']);
        $validate['password'] = Hash::make($validate['password']);

        $username = str_replace(' ', '', $validate['name']);
        $validate['username'] = strtolower($username);

        if ($request->file('avatar')) {
            $avatarName = $validate['email'] . '.' . $request->file('avatar')->extension();
            $validate['avatar'] = $request->file('avatar')->storeAs('karyawan/avatars', $avatarName);

            // $validate['avatar'] = $request->file('avatar')->store('karyawan/avatars');
        }

        User::create($validate);

        // $request->session()->flash('success', 'Registration successfull. Please login!');

        return redirect('/dashboard/users')->with('success', 'Registration successfull. Please login!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('dashboard.karyawan.account_detail', [
            'title' => 'Aplikasi Pendataan | Account Detail',
            'user' => $user,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.karyawan.edit', [
            'title' => 'Aplikasi Pendataan | Edit Data Karyawan',
            'user' => $user,
            'notifications' => Doc::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'avatar' => 'image|file|max:1024',
            // 'password' => 'min:5|max:255',
            'status' => 'required|max:255',
            'is_admin' => 'required|max:255',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if (password_verify($request->old_password, $user->password)) {

            if ($request->old_password != $request->password) {
                $rules['password'] = 'nullable|min:8|max:255';
            }
        }

        $validatedData = $request->validate($rules);

        if ($request->file('avatar')) {

            if ($request->old_avatar) {
                Storage::delete($request->old_avatar);
            }

            $avatarName = $validatedData['name'] . '.' . $request->file('avatar')->extension();
            $validatedData['avatar'] = $request->file('avatar')->storeAs('karyawan/avatars', $avatarName);
        }

        $username = str_replace(' ', '', $validatedData['name']);
        $validatedData['username'] = strtolower($username);

        if ($request->password !== null) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        // $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/users')->with('success', $validatedData['name'] . ' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $user->delete();

        return redirect('/dashboard/users')->with('success', 'User has been deleted!');
    }
}

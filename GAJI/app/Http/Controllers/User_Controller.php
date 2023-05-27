<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class User_Controller extends Controller
{
    public function index()
    {
        $akun = User::all();

        return view('user.index', compact('akun'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('user.index')->with('success', 'Akun berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('user.index')->with('success', 'Akun berhasil diperbarui');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Akun berhasil dihapus');
    }

    
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}

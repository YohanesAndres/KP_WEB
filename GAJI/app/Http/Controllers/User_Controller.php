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
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong !', 
            'email.required' => 'Email tidak boleh kosong !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.min' => 'Password harus memiliki minimal 8 karakter!',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->role = isset($role) && !empty($role) ? $role : 'Administrator';
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
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong !', 
            'email.required' => 'Email tidak boleh kosong !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.min' => 'Password harus memiliki minimal 8 karakter!',
        ]);
        
        $user = User::findOrFail($id);
        

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
            
        return redirect()->route('user.index')->with('success', 'Akun berhasil diperbarui'); // Ganti 'dashboard' dengan rute yang sesuai
        
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

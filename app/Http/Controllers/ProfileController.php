<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        return view('profil.index');
    }

    public function edit() {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function update(Request $request) {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'nik' => 'required|numeric|unique:users,nik,'.$user->id,
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->username = $request->username;
        $user->save();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

        public function updatePhoto(Request $request)
    {
        $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->photo) {
        Storage::delete('public/' . $user->photo);
    }

        // Simpan foto baru
        $path = $request->file('photo')->store('profile_photos', 'public');

        // Simpan path ke database
        $user->photo = $path;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }


    
}

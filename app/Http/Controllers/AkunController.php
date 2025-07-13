<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampilkan halaman profil
    public function show()
    {
        $user = Auth::user();
        return view('akun.show', compact('user'));
    }

    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('akun.edit', compact('user'));
    }

    // Simpan perubahan data profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'     => 'required|string|min:3|max:255',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => [
                'nullable',
                'min:6',
                'confirmed',
                'regex:/^(?=.*[0-9])(?=.*[\W_]).+$/'
            ],
        ], [
            'password.regex' => 'Password harus mengandung minimal 1 angka dan 1 simbol.',
        ]);

        $updateData = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        return redirect()->route('akun.show')->with('success', 'Profil berhasil diperbarui!');
    }

    // Upload & Simpan Foto Profil
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        // Hapus foto lama kalau ada
        if ($user->photo && Storage::disk('public')->exists('photos/' . $user->photo)) {
            Storage::disk('public')->delete('photos/' . $user->photo);
        }

        // Simpan foto baru
        $photoName = 'user_' . $user->id . '.' . $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->storeAs('photos', $photoName, 'public');

        $user->photo = $photoName;
        $user->save();

        return response()->json(['success' => true]);
    }
}

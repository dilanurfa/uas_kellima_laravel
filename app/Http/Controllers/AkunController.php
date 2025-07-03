<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = Auth::user();
        return view('akun.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('akun.edit', compact('user'));
    }

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
            'password.regex' => 'Password harus mengandung minimal 1 angka dan 1 simbol (contoh: ! @ # / - _).',
        ]);

        $updateData = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        $passwordDiubah = false;

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
            $passwordDiubah = true;
        }

        $user->update($updateData);

        return redirect()->route('akun.show')->with('success', $passwordDiubah
            ? 'Data dan password berhasil diperbarui.'
            : 'Data berhasil diperbarui tanpa mengubah password.');
    }
}

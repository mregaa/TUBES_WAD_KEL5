<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('user_account.users', compact('users'));
    }

    public function create()
    {
        return view('user_account.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:500',
            'password' => 'required|string|min:8',
            'usertype' => 'required|integer|in:0,1',
            'kode_tenant' => 'nullable|string|max:50',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
            'kode_tenant' => $request->kode_tenant,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        return view('user_account.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user_account.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:500',
        'usertype' => 'required|integer|in:0,1',
        'kode_tenant' => 'nullable|string|max:50',
        'password' => 'nullable|string|min:6',
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'usertype' => $request->usertype,
        'kode_tenant' => $request->usertype == 1 ? $request->kode_tenant : null, // Hanya simpan jika admin
        'password' => $request->password ? bcrypt($request->password) : $user->password,
    ]);

    return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}

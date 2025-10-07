<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'role' => 'required|string|max:25',
            'nik' => 'required|string|max:16|regex:/^[0-9]+$/',
            'telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8', // confirmed attribute is used to validate that the password and its confirmation match
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }
            $user = new User();
            $user->nama = $request->input('nama');
            $user->role = $request->input('role');
            $user->nik = (int) $request->input('nik');
            $user->telepon = (int) $request->input('telepon');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password')); // Default password, you should change this in production environment
            $user->save();

    return redirect()->back();

}

    public function edit($id)
    {
        $user = User::find($id);
        return view('login.admin-user-edit', compact('user'));
    }

    public function update(Request $request, $id)
{

    $user = User::find($id);
    if (!$user) {
        return response()->json(['message' => 'Karyawan not found'], 404); // Consistent JSON response
    }
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:50',
        'role' => 'required|string|max:25',
        'nik' => 'required|string|max:16|regex:/^[0-9]+$/',
        'telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
        'email' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()], 422); // 422 Unprocessable Entity
    }

    $user->nama = $request->input('nama');
    $user->role = $request->input('role');
    $user->nik = $request->input('nik');
    $user->telepon = $request->input('telepon');
    $user->email = $request->input('email');
    $user->password = $request->input('password');

    $user->update();

    return redirect()->route('showAU');
}

    public function destroy($id)
    {
            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('success', 'Data terhapus');
        }
}

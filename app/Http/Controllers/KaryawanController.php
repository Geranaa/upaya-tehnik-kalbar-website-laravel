<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }
            $karyawan = new Karyawan();
            $karyawan->nama = $request->input('nama');
            $karyawan->jabatan = $request->input('jabatan');
            $karyawan->divisi = $request->input('divisi');
            if ($request->hasFile('foto')) {
                $filename = $request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('/karyawan_foto', $filename, 'public');
                $karyawan->foto = $filename;
            }
            $karyawan->save();

    return redirect()->back();

}

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('login.admin-pegawai-edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
    $karyawan = Karyawan::find($id);
    if (!$karyawan) {
        return response()->json(['message' => 'Karyawan not found'], 404);
    }
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'divisi' => 'required|string|max:255',
        'foto' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $karyawan->nama = $request->input('nama');
    $karyawan->jabatan = $request->input('jabatan');
    $karyawan->divisi = $request->input('divisi');
    if ($request->hasFile('foto')) {
        // Delete existing foto if it exists
        if ($karyawan->foto) {
            $oldPath = public_path('storage/karyawan_foto/' . $karyawan->foto);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        // Upload new foto
        $filename = $request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('/karyawan_foto', $filename, 'public');
        $karyawan->foto = $filename;
    }

    $karyawan->update();
    return redirect()->route('showAP');
}

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $karyawan = Karyawan::findOrFail($id);

            if ($karyawan->foto) {
                $filePath = 'karyawan_foto/' . $karyawan->foto;

                Log::info('Attempting to delete file: ' . $filePath);

                if (Storage::disk('public')->exists($filePath)) {
                    Log::info('File exists. Deleting...');
                    if (!Storage::disk('public')->delete($filePath)) {
                        Log::error('File deletion failed for: ' . $filePath);
                    }
                } else {
                    Log::warning('File not found at: ' . $filePath);
                }
            }

            $karyawan->delete();

            DB::commit();

            return back()->with('success', 'Data terhapus');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting employee: ' . $e->getMessage()
            ], 500);
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Struktur;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StrukturController extends Controller
{
    public function store(Request $request) {
        {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'foto' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422); // 422 Unprocessable Entity
            }
                $struktur = new Struktur();
                $struktur->nama = $request->input('nama');
                $struktur->jabatan = $request->input('jabatan');
                if ($request->hasFile('foto')) {
                    $filename = $request->file('foto')->getClientOriginalName();
                    $path = $request->file('foto')->storeAs('/struktur_foto', $filename, 'public');
                    $struktur->foto = $filename;
                }else{
                    return response()->json(['success' => false, 'errors' => $request->errors()], 422);
                }
                $struktur->save();

        return redirect()->back();

    }
    }

    public function edit($id)
    {
        $struktur = Struktur::find($id);
        return view('login.admin-management-edit', compact('struktur'));
    }

    public function update(Request $request, $id)
    {

        $struktur = Struktur::find($id);
        if (!$struktur) {
            return response()->json(['message' => 'struktur not found'], 404); // Consistent JSON response
        }
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $struktur->nama = $request->input('nama');
        $struktur->jabatan = $request->input('jabatan');
        if ($request->hasFile('foto')) {
            // Delete existing foto if it exists
            if ($struktur->foto) {
                $oldPath = public_path('storage/struktur_foto/' . $struktur->foto);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            // Upload new foto
            $filename = $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('/struktur_foto', $filename, 'public');
            $struktur->foto = $filename;
        }

        $struktur->update();
        return redirect()->route('showAM');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $struktur = Struktur::findOrFail($id);

            if ($struktur->foto) {
                $filePath = 'struktur_foto/' . $struktur->foto; // Remove 'public/'

                Log::info('Attempting to delete file: ' . $filePath);

                if (Storage::disk('public')->exists($filePath)) {
                    Log::info('File exists. Deleting...');
                    if (!Storage::disk('public')->delete($filePath)) {
                        Log::error('File deletion failed for: ' . $filePath);
                        // Consider throwing a custom exception here
                    }
                } else {
                    Log::warning('File not found at: ' . $filePath);
                }
            }

            $struktur->delete();

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

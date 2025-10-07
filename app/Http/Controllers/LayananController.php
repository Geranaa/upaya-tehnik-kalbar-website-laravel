<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class LayananController extends Controller
{

    public function layanan_ioan()
    {
        $karyawanIoan = Karyawan::where('divisi', 'assurance')
            ->whereIn('jabatan', ['Astman', 'Admin' , 'Teknisi'])
            ->orderByRaw("FIELD(jabatan, 'Astman', 'Admin', 'Teknisi')")
            ->get();

        return view('Layanan.layanan_ioan', compact('karyawanIoan'));
    }
    public function layanan_maintenance()
    {
        $karyawanMaintenance = Karyawan::where('divisi', 'maintenance')
        ->whereIn('jabatan', ['Astman', 'Admin', 'Teknisi'])
        ->orderByRaw("FIELD(jabatan, 'Astman', 'Admin', 'Teknisi')")
        ->get();

    return view('Layanan.layanan_maintenance', compact('karyawanMaintenance'));
    }
    public function layanan_project()
    {
        $karyawanProject = Karyawan::where('divisi', 'project')
        ->whereIn('jabatan', ['Astman', 'Admin', 'Teknisi'])
        ->orderByRaw("FIELD(jabatan, 'Astman', 'Admin', 'Teknisi')")
        ->get();

    return view('Layanan.layanan_project', compact('karyawanProject'));
    }
    public function layanan_provi()
    {
        $karyawanProvi = Karyawan::where('divisi', 'provi')
        ->whereIn('jabatan', ['Astman', 'Admin', 'Teknisi'])
        ->orderByRaw("FIELD(jabatan, 'Astman', 'Admin', 'Teknisi')")
        ->get();

    return view('Layanan.layanan_provi', compact('karyawanProvi'));
    }

    //
}

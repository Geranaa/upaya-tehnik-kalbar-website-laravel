<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;

class PerusahaanController extends Controller
{
    public function profilPerusahaan(){
        return view(
            'Perusahaan.profilperusahaan'
        );
    }

    public function contactUs(){
        return view(
            'Perusahaan.contact_us'
        );
    }

    public function showStruktur(){
        $siteManager = Struktur::where('jabatan', 'Site Manager')->get();
        $astmanProject = Struktur::where('jabatan', 'Astman Project')->get();
        $astmanAssurance = Struktur::where('jabatan', 'Astman Assurance')->get();
        $astmanProvisioning = Struktur::where('jabatan', 'Astman Provisioning')->get();
        $astmanMaintenance = Struktur::where('jabatan', 'Astman Maintenance')->get();
        $adminProject = Struktur::where('jabatan', 'Admin Project')->get();
        $adminProject2 = Struktur::where('jabatan', 'Admin Project 2')->get();
        $adminAssurance = Struktur::where('jabatan', 'Admin Assurance')->get();
        $adminProvisioning = Struktur::where('jabatan', 'Admin Provisioning')->get();
        $adminMaintenance = Struktur::where('jabatan', 'Admin Maintenance')->get();
        $adminLogistik = Struktur::where('jabatan', 'Admin Logistik')->get();
    return view('Perusahaan.struktur_perusahaan', compact('siteManager', 'astmanProject','astmanAssurance','astmanProvisioning','astmanMaintenance','adminProject', 'adminProject2', 'adminAssurance', 'adminProvisioning', 'adminMaintenance', 'adminLogistik'));
    }

    //
}

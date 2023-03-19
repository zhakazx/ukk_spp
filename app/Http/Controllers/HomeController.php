<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;

class HomeController extends Controller
{
    public function getTotalSiswaByLevel($level) {
        return Siswa::query()
                ->whereHas('spp', function($q) use ($level) {
                    $q->where('level', $level);
                })
                ->count();
    }

    public function getNominalSppByLevel($level) {
        return Spp::query()
                ->where('level', $level)
                ->sum('nominal');
    }

    public function getSppLunasByLevel($level) {
        return Pembayaran::query()
                    ->whereHas('spp', function($q) use ($level) {
                        $q->where('level', $level);
                    })
                    ->count();
    }

    public function dashboard() {
        //Total siswa per kelas
        $totalSiswaX = $this->getTotalSiswaByLevel('X');
        $totalSiswaXI = $this->getTotalSiswaByLevel('XI');
        $totalSiswaXII = $this->getTotalSiswaByLevel('XII');
        //Total nominal spp per kelas
        $nominalSppX = $this->getNominalSppByLevel('X');
        $nominalSppXI = $this->getNominalSppByLevel('XI');
        $nominalSppXII = $this->getNominalSppByLevel('XII');
        // Total spp siswa yang lunas per kelas
        $totalSiswaLunasX = $this->getSppLunasByLevel('X');
        $totalSiswaLunasXI = $this->getSppLunasByLevel('XI');
        $totalSiswaLunasXII = $this->getSppLunasByLevel('XII');
        // Total pembayaran per kelas
        $totalPembayaranX = $totalSiswaLunasX * $nominalSppX;
        $totalPembayaranXI = $totalSiswaLunasXI * $nominalSppXI;
        $totalPembayaranXII = $totalSiswaLunasXII * $nominalSppXII;
        // Total tunggakan per kelas
        $totalTunggakanX = ($totalSiswaX * $nominalSppX * 12) - $totalPembayaranX;
        $totalTunggakanXI = ($totalSiswaXI * $nominalSppXI * 12) - $totalPembayaranXI;
        $totalTunggakanXII = ($totalSiswaXII * $nominalSppXII * 12) - $totalPembayaranXII;

        return view('page_admin.dashboard', [
            'siswaCount' => Siswa::count(),
            'kelasCount' => Kelas::count(),
            'sppCount' => Spp::count(),
            'petugasCount' => User::count(),

            'totalPembayaranX' => $totalPembayaranX,
            'totalPembayaranXI' => $totalPembayaranXI,
            'totalPembayaranXII' => $totalPembayaranXII,

            'totalTunggakanX' => $totalTunggakanX,
            'totalTunggakanXI' => $totalTunggakanXI,
            'totalTunggakanXII' => $totalTunggakanXII,
        ]);
    }
}

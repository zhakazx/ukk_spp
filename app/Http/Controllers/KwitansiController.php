<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kwitansi;
use App\Models\Siswa;
use App\Models\Kelas;
use Carbon\Carbon;

class KwitansiController extends Controller
{
    public $months;

    public function __construct()
    {
        $this->months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
        ];
    }

    /**
     * Bagian Kwitansi Siswa
     */
    public function kwitansiSiswa() {
        $kwitansi = Kwitansi::query()
                        ->with('siswa')
                        ->where('tanggal', Carbon::today()->format('Y-m-d'))
                        ->paginate(10);
        return view('page_petugas.kwitansi.view_siswa' , [
            'kwitansi' => $kwitansi
        ]);
    }

    public function cetakKwitansiSiswa($nis) {
        $siswa = Siswa::query()
                    ->with('kelas')
                    ->where('nis', $nis)
                    ->firstOrFail();
        return view('page_petugas.kwitansi.cetak_siswa', [
            'siswa' => $siswa,
            'tanggalSekarang' => Carbon::now()->isoFormat('dddd, D MMMM YYYY')
        ]);
    }

    /**
     * Bagian Kwitansi Kelas
     */
    public function kwitansiKelas() {
        $kelas = Kelas::query()
                    ->orderBy('nama_kelas')
                    ->paginate(10);
        return view('page_petugas.kwitansi.view_kelas' , [
            'kelas' => $kelas
        ]);
    }

    public function cetakKwitansiKelas($id) {
        $kelas = Kelas::query()
                    ->where('id', $id)
                    ->firstOrFail();

        $siswa = Siswa::query()
                    ->with(['pembayaran', 'spp'])
                    ->where('id_kelas', $id)
                    ->get();
        return view('page_petugas.kwitansi.cetak_kelas', [
            'kelas' => $kelas,
            'siswa' => $siswa,
            'months' => $this->months,
            'tanggalSekarang' => Carbon::now()->isoFormat('dddd, D MMMM YYYY')
        ]);
    }

    /**
     * Bagian Kwitansi Kelas
     */
    public function kwitansiTunggakan() {
        $kelas = Kelas::query()
                    ->orderBy('nama_kelas')
                    ->paginate(10);
        return view('page_petugas.kwitansi.view_tunggakan' , [
            'kelas' => $kelas
        ]);
    }

    public function cetakTunggakan($id) {
        $kelas = Kelas::query()
                    ->where('id', $id)
                    ->firstOrFail();

        $siswa = Siswa::query()
                    ->with(['pembayaran', 'spp'])
                    ->where('id_kelas', $id)
                    ->get();
        return view('page_petugas.kwitansi.cetak_tunggakan', [
            'kelas' => $kelas,
            'siswa' => $siswa,
            'months' => $this->months,
            'tanggalSekarang' => Carbon::now()->isoFormat('dddd, D MMMM YYYY')
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Kwitansi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public $months;

    public function __construct()
    {
        $this->months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
        ];
    }

    public function index()
    {
        $search = request('search');
        $query = Siswa::query()
                ->with(['pembayaran', 'kelas'])
                ->whereHas('kelas', function($q) use ($search) {
                    $q->where('nama_kelas', "%{$search}%");
                })
                ->where('nama', 'LIKE', "%{$search}%")
                ->orWhere('nis', 'LIKE', "%{$search}%")
                ->orderBy('nis', 'DESC')
                ->paginate(10);

        return view('page_petugas.pembayaran.index' , [
            'months' => $this->months,
            'siswa' => $query
        ]);
    }

    public function transaksi($nis)
    {
        $siswa = Siswa::query()->where('nis', $nis)->firstOrFail();
        return view('page_petugas.pembayaran.transaksi' , [
            'siswa' => $siswa,
            'months' => $this->months
        ]);
    }

    public function bayar(Request $request, $nis)
    {
        $siswa = Siswa::query()->where('nis', $nis)->firstOrFail();

        $existingPayment = Pembayaran::query()
                            ->where('nisn', $request->nisn)
                            ->whereIn('bulan_dibayar', $request->bulan_dibayar)
                            ->get();
        
        if($existingPayment->isNotEmpty()) return back()->with('error', 'Data bulan tersebut telah dibayar');

        foreach ($request->bulan_dibayar as $bulan) {
            $pembayaran = Pembayaran::create([
                'id_petugas' => auth()->user()->id,
                'nisn' => $siswa->nisn,
                'tgl_bayar' => Carbon::now()->format('Y-m-d'),
                'bulan_dibayar' => $bulan,
                'tahun_dibayar' => Carbon::now()->format('Y'),
                'id_spp' => $siswa->spp->id,
                'jumlah_bayar' => $siswa->spp->nominal,
            ]);
        }
        if ($pembayaran) {
            Kwitansi::create([
                'nis' => $siswa->nis,
                'tanggal' => now()->format('Y-m-d'),
                'bulan' => implode(',', $request->bulan_dibayar)
            ]);
        }

        return back();
    }
}

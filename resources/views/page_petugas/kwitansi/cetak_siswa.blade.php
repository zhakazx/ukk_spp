<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kwitansi</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="border p-3">
            <h4 class="text-center mt-3 mb-3">Kwitansi Pembayaran Spp</h4>
            <hr>
            <span>Tanggal : {{ $tanggalSekarang }}</span>
            <table cellpadding="2">
                <tr>
                    <td width="5%">Sudah terima dari</td>
                    <td width="2%">:</td>
                    <td width="20%">
                       <b>
                        {{ $siswa->nis }} / {{ $siswa->nama }} / {{ $siswa->kelas->nama_kelas }}
                       </b>           
                    </td>
                </tr>
                <tr>
                    <td width="5%">Untuk pembayaran</td>
                    <td width="2%">:</td>
                    <td width="20%">
                        <span class="text-bold">SPP Bulan </span>
                        {{ $siswa->pembayaran->bulan }}
                    </td>
                </tr>
                <tr>
                    <td width="5%">Jumlah Pembayaran</td>
                    <td width="2%">:</td>
                    <td width="20%">Rp. 600.000,-</td>
                </tr>
                <tr>
                    <td width="5%">Terbilang</td>
                    <td width="2%">:</td>
                    <td width="20%"></td>
                </tr>
            </table>
            <hr>
            <p class="text-end">
                Bendahara sekolah
                <br>
                <br>
                <br>
                <br>
                <b>Hasmawati, S.Pd</b>
            </p>
        </div>
    </div>
    
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>  
</body>
</html>
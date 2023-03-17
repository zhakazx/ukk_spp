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
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h4 class="mt-2 mb-3">Laporan Pembayaran Spp Kelas {{ $kelas->nama_kelas }}</h4>
                <h6 class="mt-1 mb-3">SMKS Mutiara Ilmu Makassar</h6>
            </div>
            <hr>
            <table class="table-bordered" width="100%" cellpadding="2">
                <thead class="text-dark">
                    <tr>
                        <th rowspan="2" class="text-center">No.</th>
                        <th rowspan="2" class="text-center">NIS</th>
                        <th rowspan="2" class="text-center">Nama</th>
                        <th colspan="12" class="text-center">Rincian Pembayaran</th>
                        <th rowspan="2" class="text-center">Total</th>
                    </tr>
                    <tr>
                        @foreach ($months as $month)
                            <th class="text-center">{{ str()->limit($month, 3, '') }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                        <tr class="text-dark">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            @foreach ($months as $month)
                            <td class="text-center">
                                <span class="text-sm font-weight-normal">
                                    @if ($item->pembayaran->contains('bulan_dibayar', $month))
                                    {{ $item->spp->nominal }}
                                    @else
                                    0
                                    @endif
                                </span>
                            </td>
                            @endforeach
                            <td class="text-center">
                                {{ count($item->pembayaran) * $item->spp->nominal }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>  
</body>
</html>
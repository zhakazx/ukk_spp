@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center mb-3">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Data Pembayaran</h6>
              <p class="text-sm mb-sm-0">Data Pembayaran SMKS Mutiara Ilmu</p>
            </div>
            <div class="ms-auto d-flex">
              <form action="" method="get" class="me-2">
                <div class="input-group input-group-sm ms-auto">
                  <span class="input-group-text text-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </span>
                  <input type="text" name="search" class="form-control form-control-sm" placeholder="Search">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-0">
          <div class="table-responsive p-0">
            <table class="table table-bordered align-items-center justify-content-center mb-0" id="datatable" width="100%">
              <thead class="bg-gray-100">
                <tr class="text-center">
                  <th class="text-secondary text-xs font-weight-semibold opacity-7">No</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">NISN</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">NIS</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Nama</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Kelas</th>
                  @foreach($months as $month)
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">{{ $loop->iteration }}</th>
                  @endforeach
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($siswa as $item)
                <tr>
                  <td class="text-center">
                    <span class="text-sm font-weight-normal">{{ $loop->iteration }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->nisn }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->nis }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->nama }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->kelas->nama_kelas ?? '-' }}</span>
                  </td>
                  @foreach ($months as $month)
                    <td class="text-center">
                      <span class="text-sm font-weight-normal">
                        @if ($item->pembayaran->contains('bulan_dibayar', $month))
                          <i class="fa fa-check text-success"></i>
                        @else
                          <i class="fa fa-times text-danger"></i>
                        @endif
                      </span>
                    </td>
                  @endforeach
                  <td class="align-middle">
                    <a href="{{ route('transaksi', $item->nis) }}" class="btn btn-sm btn-primary d-sm-block d-none mb-0">
                      <i class="fa fa-shopping-basket text-lg"></i>
                    </a>
                  </td>
                </tr>
                @empty
                  <tr>
                    <td colspan="18" class="text-center">
                      Data tidak ditemukan
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <div class="py-3 px-3 d-flex justify-content-center justify-content-md-between justify-content-lg-between align-items-center">
            {{ $siswa->links('layouts.pagination') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
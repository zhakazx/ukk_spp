@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center mb-3">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Kwitansi Siswa</h6>
              <p class="text-sm mb-sm-0">Kwitansi bulan ini SMKS Mutiara Ilmu</p>
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
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">NIS</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Nama</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Kelas</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Pembayaran Bulan Ini</th>
                  <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($kwitansi as $item)
                <tr>
                  <td class="text-center">
                    <span class="text-sm font-weight-normal">{{ $loop->iteration }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->nis }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->siswa->nama }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->siswa->kelas->nama_kelas }}</span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-normal">{{ $item->bulan }}</span>
                  </td>
                  <td>
                    <a href="{{ route('cetak.kwitansi.siswa', $item->nis) }}" target="_blank" class="btn btn-sm btn-success d-sm-block d-none mb-0">
                      <i class="fa fa-print text-lg"></i>
                    </a>
                  </td>
                </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">
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
            {{ $kwitansi->links('layouts.pagination') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
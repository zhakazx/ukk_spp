@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0 mb-3">
          <div class="d-sm-flex align-items-center mb-3">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Transaksi</h6>
              <p class="text-sm mb-sm-0">Pembayaran SPP SMKS Mutiara Ilmu</p>
            </div>
          </div>
        </div>
        <div class="card-body px-0 py-0">
          <div class="container">
            <form action="{{ route('bayar', $siswa->nis) }}" class="row" method="POST">
              @csrf
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="nisn" class="form-control-label">NISN</label>
                    <input class="form-control"
                          type="number" 
                          placeholder="Masukkan NISN" 
                          id="nisn" 
                          name="nisn"
                          value="{{ $siswa->nisn }}"
                          readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="form-control-label">Nama</label>
                    <input class="form-control"
                          type="text" 
                          placeholder="Masukkan nama" 
                          id="nama" 
                          name="nama"
                          value="{{ $siswa->nama }}"
                          readonly>
                  </div>
                  <div class="form-group">
                    <label for="kelas" class="form-control-label">Kelas</label>
                    <input class="form-control"
                          type="text" 
                          placeholder="Masukkan kelas" 
                          id="kelas" 
                          name="id_kelas"
                          value="{{ $siswa->kelas->nama_kelas }}"
                          readonly>
                  </div>
                  <div class="form-group">
                    <a href="{{ route('pembayaran') }}"
                       class="btn btn-white mt-2 mb-2">
                      Kembali
                    </a>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="container">
                    <h4 class="font-weight-semibold">Total Transaksi SPP</h4>
                    <blockquote class="blockquote text-white mb-4">
                      <p class="text-dark ms-3 fs-4 mb-3">Rp. {{ number_format($siswa->spp->nominal) }},-</p>
                      <footer class="blockquote-footer text-sm ms-3">
                        Catatan: <br>
                        Jumlah yang harus dibayarkan tiap bulan : Rp. {{ number_format($siswa->spp->nominal) }}
                      </footer>
                    </blockquote>
                    <div class="form-group">
                      <select class="form-select" multiple="multiple" name="bulan_dibayar[]" id="selectForm">
                        @foreach ($months as $month)
                          <option value="{{ $month }}">{{ $month }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div>
                      @if (session('error'))
                          <span class="text-red">
                            {{ session('error') }}
                          </span>
                      @endif
                      <button type="submit" class="btn btn-dark btn-icon d-flex align-items-center mt-2 mb-0 me-2">
                        <span class="btn-inner--icon">
                          <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span class="btn-inner--text">Bayar</span>
                      </button>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @foreach ($months as $month)
      <div class="col-4 d-flex justify-content-between flex-wrap gap-1">
        <div class="border d-flex justify-content-center px-3 w-100 btn {{ $siswa->pembayaran->contains('bulan_dibayar', $month) ? 'btn-primary' : 'btn-white' }}">
          {{ $month }}
          @if ($siswa->pembayaran->contains('bulan_dibayar', $month))
            (Lunas)
          @else
            (B.Lunas)
          @endif
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

@push('script')
  <script>
    $(document).ready(function() {
      $('#selectForm').select2();
    })
  </script>   
@endpush
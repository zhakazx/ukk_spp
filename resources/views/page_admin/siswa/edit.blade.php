@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center mb-3">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Ubah Data</h6>
              <p class="text-sm mb-sm-0">Data siswa SMKS Mutiara Ilmu</p>
            </div>
          </div>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn" class="form-control-label">NISN</label>
                            <input class="form-control @error('nisn')is-invalid @enderror"
                                  type="number" 
                                  placeholder="Masukkan NISN" 
                                  id="nisn" 
                                  name="nisn"
                                  value="{{ old('nisn', $siswa->nisn) }}">
                            @error('nisn')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nis" class="form-control-label">NIS</label>
                            <input class="form-control @error('nis')is-invalid @enderror" 
                                  type="text" 
                                  placeholder="Masukkan NIS" 
                                  id="nis" 
                                  name="nis"
                                  value="{{ old('nis', $siswa->nis) }}">
                            @error('nis')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="form-control-label">Nama</label>
                            <input class="form-control @error('nama')is-invalid @enderror" 
                                  type="text" 
                                  placeholder="Masukkan Nama" 
                                  id="nama" 
                                  name="nama"
                                  value="{{ old('nama', $siswa->nama) }}">
                            @error('nama')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas" class="form-control-label">Kelas</label>
                            <select name="id_kelas" id="kelas" class="form-select @error('id_kelas')is-invalid @enderror">
                              <option value="">- Pilih Kelas -</option>
                              @foreach ($kelas as $item)
                                @if (old('id_kelas',$siswa->id_kelas) == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nama_kelas }}</option>                          
                                @endif
                                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                              @endforeach
                            </select>
                            @error('id_kelas')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat" class="form-control-label">Alamat</label>
                            <input class="form-control @error('alamat')is-invalid @enderror" 
                                  type="text" 
                                  placeholder="Masukkan Alamat" 
                                  id="alamat" 
                                  name="alamat"
                                  value="{{ old('alamat', $siswa->alamat) }}">
                            @error('alamat')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_telp" class="form-control-label">No Telp</label>
                            <input class="form-control @error('no_telp')is-invalid @enderror" 
                                  type="tel" 
                                  placeholder="Masukkan No Telp" 
                                  id="no_telp" 
                                  name="no_telp"
                                  value="{{ old('no_telp', $siswa->no_telp) }}">
                            @error('no_telp')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_spp" class="form-control-label">SPP</label>
                            <select name="id_spp" id="spp" class="form-select @error('id_spp')is-invalid @enderror">
                                <option value="">- Pilih Jumlah Spp -</option>
                              @foreach ($spp as $item)
                                @if (old('id_spp',$siswa->id_spp) == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nominal }}</option>                                
                                @endif
                                <option value="{{ $item->id }}">{{ $item->nominal }}</option>
                              @endforeach
                            </select>
                            @error('id_spp')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="py-3 px-3 d-flex align-items-center">
                    <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-white mb-0">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2 ms-auto">
                        <span class="btn-inner--icon">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                        </svg>
                        </span>
                        <span class="btn-inner--text">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
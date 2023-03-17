@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
          <div class="d-sm-flex align-items-center mb-3">
            <div>
              <h6 class="font-weight-semibold text-lg mb-0">Tambah Data</h6>
              <p class="text-sm mb-sm-0">Data petugas SMKS Mutiara Ilmu</p>
            </div>
          </div>
        </div>
        <div class="card-body">
        <form action="{{ route('petugas.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_petugas" class="form-control-label">Nama Petugas</label>
                            <input class="form-control @error('nama_petugas')is-invalid @enderror"
                                  type="text" 
                                  placeholder="Masukkan Nama Petugas" 
                                  id="nama_petugas" 
                                  name="nama_petugas">
                            @error('nama_petugas')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username" class="form-control-label">Username</label>
                            <input class="form-control @error('username')is-invalid @enderror" 
                                  type="text" 
                                  placeholder="Masukkan Username" 
                                  id="username" 
                                  name="username">
                            @error('username')
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
                            <label for="password" class="form-control-label">Password</label>
                            <input class="form-control @error('password')is-invalid @enderror" 
                                  type="text" 
                                  placeholder="Masukkan Password" 
                                  id="password" 
                                  name="password">
                            @error('password')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="level" class="form-control-label">Level</label>
                            <select name="level" id="level" class="form-select @error('level')is-invalid @enderror">
                              <option value="">- Pilih level -</option>
                              <option value="admin">Admin</option>
                              <option value="petugas">Petugas</option>
                            </select>
                            @error('level')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                </div>
          <div class="py-3 px-3 d-flex align-items-center">
            <a href="{{ route('petugas.index') }}" class="btn btn-sm btn-white mb-0">Kembali</a>
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
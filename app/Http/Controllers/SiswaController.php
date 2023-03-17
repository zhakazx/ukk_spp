<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Kelas;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('page_admin.siswa.index', ['siswa' => Siswa::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page_admin.siswa.create', [
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiswaRequest $request)
    {
        $validator = $request->validated();
        Siswa::create($validator);

        Alert::success('Success', 'Data berhasil ditambahkan');
        
        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('page_admin.siswa.edit', [
            'siswa' => $siswa,
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiswaRequest  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $validator = $request->validated();
        $siswa->update($validator);

        Alert::success('Success', 'Data berhasil diubah');
        
        return redirect()->route('siswa.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}

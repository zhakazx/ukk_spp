<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Http\Requests\StoreSppRequest;
use App\Http\Requests\UpdateSppRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page_admin.spp.index', [
            'spp' => Spp::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSppRequest $request)
    {
        $validator = $request->validated();
        Spp::create($validator);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect()->route('spp.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(Spp $spp)
    {
        return response()->json($spp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSppRequest  $request
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSppRequest $request, Spp $spp)
    {
        $validator = $request->validated();
        $spp->update($validator);

        Alert::success('Success', 'Data berhasil diubah');
        
        return redirect()->route('spp.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spp $spp)
    {
        $spp->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect()->route('spp.index')->with('success', 'Data berhasil dihapus');

    }
}

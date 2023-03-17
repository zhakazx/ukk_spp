<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\User;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');
        $query = User::query()
                ->where('nama_petugas', 'LIKE', "%{$search}%")
                ->paginate(2)
                ->withQueryString();

        return view('page_admin.petugas.index', [
            'petugas' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page_admin.petugas.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetugasRequest $request)
    {
        $validator = $request->validated();
        $validator['password'] = bcrypt($request->password);
        User::create($validator);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect()->route('petugas.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('page_admin.petugas.edit', [
            'petugas' => $petugas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetugasRequest $request, $id)
    {
        $petugas = User::findOrFail($id);

        $validator = $request->validated();
        $petugas->update($validator);

        Alert::success('Success', 'Data berhasil diubah');
        
        return redirect()->route('petugas.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $petugas)
    {
        // $petugas = User::findOrFail($id);
        $petugas->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect()->route('petugas.index')->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pribadi;
use Illuminate\Http\Request;

class PribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pribadi = Pribadi::orderBy('id_pribadi', 'desc')->paginate(5);
        return view('pribadi.index', compact('pribadi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pribadi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik'             => 'required',
            'nama_mahasiswa'  => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required',
        ]);

        Pribadi::create($request->post());

        return redirect()
            ->route('pribadi.index')
            ->with('success', 'Data Mahasiswa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Bisa kamu isi nanti jika dibutuhkan
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pribadi  $pribadi
     * @return \Illuminate\Http\Response
     */
    public function edit(Pribadi $pribadi)
    {
        return view('pribadi.edit', compact('pribadi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pribadi       $pribadi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pribadi $pribadi)
    {
        $request->validate([
            'nik'             => 'required',
            'nama_mahasiswa'  => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required',
        ]);

        $pribadi->fill($request->post())->save();

        return redirect()
            ->route('pribadi.index')
            ->with('success', 'Data Pribadi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pribadi  $pribadi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pribadi $pribadi)
    {
        $pribadi->delete();

        return redirect()
            ->route('pribadi.index')
            ->with('success', 'Data Pribadi berhasil dihapus.');
    }
}

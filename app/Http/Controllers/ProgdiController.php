<?php

namespace App\Http\Controllers;

use App\Models\Progdi;
use Illuminate\Http\Request;

class ProgdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progdi = Progdi::orderBy('id_progdi', 'desc')->paginate(5);
        return view('progdi.index', compact('progdi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('progdi.create');
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
            'nm_fakultas' => 'required',
            'nm_progdi'   => 'required'
        ]);

        Progdi::create($request->all());

        return redirect()->route('progdi.index')
                         ->with('success', 'Data Progdi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progdi = Progdi::findOrFail($id);
        return view('progdi.show', compact('progdi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Progdi  $progdi
     * @return \Illuminate\Http\Response
     */
    public function edit(Progdi $progdi)
    {
        return view('progdi.edit', compact('progdi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progdi        $progdi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progdi $progdi)
    {
        $request->validate([
            'nm_fakultas' => 'required',
            'nm_progdi'   => 'required',
        ]);

        $progdi->fill($request->post())->save();

        return redirect()->route('progdi.index')
                         ->with('success', 'Data Program Studi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progdi  $progdi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progdi $progdi)
    {
        $progdi->delete();

        return redirect()
            ->route('progdi.index')
            ->with('success', 'Data Program Studi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Progdi;
use App\Models\Pribadi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = DB::table('pribadis')
            ->select(
                'pribadis.id_pribadi',
                'pribadis.nama_mahasiswa',
                'mahasiswas.id_pri',
                'mahasiswas.id_pro',
                'mahasiswas.nim',
                'progdis.nm_fakultas',
                'progdis.nm_progdi',
                'mahasiswas.id'
            )
            ->leftJoin('mahasiswas', 'pribadis.id_pribadi', '=', 'mahasiswas.id_pri')
            ->leftJoin('progdis', 'mahasiswas.id_pro', '=', 'progdis.id_progdi')
            ->orderBy('pribadis.id_pribadi', 'desc')
            ->paginate(5);

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function daftar($id_pribadi)
    {
        $pribadi = DB::table('pribadis')->where('id_pribadi', $id_pribadi)->get();
        $progdi = Progdi::all();

        return view('mahasiswa.daftar', [
            'pribadi' => $pribadi,
            'progdi'  => $progdi
        ]);
    }

    public function store(Request $request)
    {
        DB::table('mahasiswas')->insert([
            'nim'     => $request->nim,
            'id_pri'  => $request->id_pribadi,
            'id_pro'  => $request->id_progdi
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Baru Berhasil disimpan.');
    }

  public function search(Request $request)
{
    $keyword = $request->search;

    $pribadi = DB::table('pribadis')
        ->leftJoin('mahasiswas', 'pribadis.id_pribadi', '=', 'mahasiswas.id_pri')
        ->select(
            'pribadis.id_pribadi',
            'pribadis.nik',
            'pribadis.tempat_lahir',
            'pribadis.tanggal_lahir',
            'pribadis.nama_mahasiswa',
            'mahasiswas.nim'
        )
        ->where('pribadis.nama_mahasiswa', 'like', '%' . $keyword . '%')
        ->get();

    return view('mahasiswa.search', compact('pribadi'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}

}

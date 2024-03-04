<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\KonfigurasiWaktu;
use App\Models\Laporan;
use App\Models\Pos;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $list_laporan = [];
        if ($user->is_admin === 1) {
            $list_laporan = Laporan::all();
        } else {
            $list_laporan = Laporan::where('user_id', $user->id)->get();
        }

        return view('laporan', compact('list_laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_wilayah = Wilayah::all();
        $list_pos = Pos::all();
        $list_waktu = KonfigurasiWaktu::all();
        return view('laporan_tambah', compact('list_wilayah', 'list_pos', 'list_waktu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pos_id' => 'required|exists:pos,id',
            'waktu_id' => 'required|exists:konfigurasi_waktu,id',
            'curah_hujan' => 'required|integer',
            'tinggi_muka_air' => 'required|integer',
            'klimatologi' => 'required|integer',
            'kualitas_air' => 'required|integer'
        ]);
        $laporan = new Laporan($request->all());
        $laporan->user_id = Auth::user()->id;
//        $laporan->tanggal = Carbon::createFromFormat('d/M/Y H:i:s', $request->tanggal)->format('Y-m-d H:i:s');
        $laporan->save();

        return redirect()->route('laporan.index')->with('message', 'Laporan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
//        dd($laporan->user_id);
        $list_wilayah = Wilayah::all();
        $list_pos = Pos::all();
        $list_waktu = KonfigurasiWaktu::all();

        return view('laporan_edit', compact('laporan', 'list_wilayah', 'list_pos', 'list_waktu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
//            'user_id' => 'required|exists:users,id',
            'pos_id' => 'required|exists:pos,id',
            'waktu_id' => 'required|exists:konfigurasi_waktu,id',
            'curah_hujan' => 'required|integer',
            'tinggi_muka_air' => 'required|integer',
            'klimatologi' => 'required|integer',
            'kualitas_air' => 'required|integer'
        ]);

        $laporan = Laporan::findorfail($id);
        $laporan->tanggal = $request->tanggal;
        $laporan->pos_id = $request->pos_id;
        $laporan->waktu_id = $request->waktu_id;
        $laporan->curah_hujan = $request->curah_hujan;
        $laporan->tinggi_muka_air = $request->tinggi_muka_air;
        $laporan->klimatologi = $request->klimatologi;
        $laporan->kualitas_air = $request->kualitas_air;
        $laporan->save();

        return redirect()->route('laporan.index')->with('message', 'Laporan berhasil diedit!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $laporan = Laporan::findorfail($id);
        $laporan->delete();
        return redirect()->route('laporan.index')->with('message', 'Laporan berhasil dihapus!');
    }

    public function export() {
        $namaFile = Auth::user()->name . '_' . Carbon::now() . '.xlsx';
//        dd(Auth::user()->is_admin);
        return Excel::download(new LaporanExport, $namaFile);
    }
}

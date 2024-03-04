<?php

namespace App\Http\Controllers;

use App\Models\KonfigurasiWaktu;
use Illuminate\Http\Request;

class KonfigurasiWaktuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_konfigurasi_waktu = KonfigurasiWaktu::all();
        return view('konfigurasi_waktu', compact('list_konfigurasi_waktu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('konfigurasi_waktu_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $konfigurasi_waktu = new KonfigurasiWaktu();
        $konfigurasi_waktu->nama = $request->nama;

        $konfigurasi_waktu->save();
        return redirect()->route('konfigurasi-waktu.index')->with('message', 'Jenis Waktu Laporan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KonfigurasiWaktu $konfigurasiWaktu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KonfigurasiWaktu $konfigurasiWaktu)
    {
        //
        return view('konfigurasi_waktu_edit', compact('konfigurasiWaktu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $konfigurasi_waktu = KonfigurasiWaktu::findorfail($id);
        $request->validate([
            'nama' => 'required'
        ]);

        $konfigurasi_waktu->nama = $request->nama;

        $konfigurasi_waktu->save();
        return redirect()->route('konfigurasi-waktu.index')->with('message', 'Jenis Waktu Laporan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $konfigurasi_waktu = KonfigurasiWaktu::findorfail($id);
        $konfigurasi_waktu->delete();

        return redirect()->route('konfigurasi-waktu.index')->with('message', 'Jenis Waktu Laporan berhasil diihapus!');
    }
}

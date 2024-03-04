<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_wilayah = Wilayah::all();
        return view('konfigurasi_wilayah', compact('list_wilayah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('konfigurasi_wilayah_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $wilayah = new Wilayah();
        $wilayah->nama = $request->nama;

        $wilayah->save();
        return redirect()->route('konfigurasi-wilayah.index')->with('message', 'Wilayah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah, $id)
    {
        $wilayah = Wilayah::findorfail($id);
        return view('konfigurasi_wilayah_edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::findorfail($id);
        $request->validate([
            'nama' => 'required'
        ]);

        $wilayah->nama = $request->nama;

        $wilayah->save();
        return redirect()->route('konfigurasi-wilayah.index')->with('message', 'Wilayah berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wilayah = Wilayah::findorfail($id);
        $wilayah->delete();

        return redirect()->route('konfigurasi-wilayah.index')->with('message', 'Wilayah berhasil diihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_pos = Pos::all();
        return view('pos', compact('list_pos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_wilayah = Wilayah::all();
        return view('pos_tambah', compact('list_wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'wilayah_id' => 'required|exists:wilayah,id'
        ]);
        $pos = new Pos($request->all());
        $pos->save();
        return redirect()->route('pos.index')->with('message', 'Pos berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pos $pos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pos $pos)
    {
//        $pos = Pos::findorfail($id);
        $list_wilayah = Wilayah::all();
        return view('pos_edit', compact('pos', 'list_wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'wilayah_id' => 'required|exists:wilayah,id'
        ]);
        $pos = Pos::findorfail($id);
        $pos->nama = $request->nama;
        $pos->wilayah_id = $request->wilayah_id;

        $pos->save();
        return redirect()->route('pos.index')->with('message', 'Pos berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pos = Pos::findorfail($id);
        $pos->delete();

        return redirect()->route('pos.index')->with('message', 'Pos berhasil diihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd(User::findorfail(2)->pos->nama);
        $list_user = User::all();
        return view('user', compact('list_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_wilayah = Wilayah::all();
        $list_pos = Pos::all();
        return view('user_tambah', compact('list_wilayah', 'list_pos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:6|unique:users,username',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string|min:8',
            'pos_id' => 'exists:pos,id'
        ]);
        $user = new User($request->all());
        $user['password'] = Hash::make($request->password);

//        dd($user);
        $user->save();
        return redirect()->route('konfigurasi-user.index')->with('message', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorfail($id);
        $list_wilayah = Wilayah::all();
        $list_pos = Pos::all();

        return view("user_edit", compact("user", "list_wilayah", "list_pos"));
//        dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $containPassword = !is_null($request['password']);
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:6|unique:users,username,' . $id,
            'email' => 'required|email:rfc,dns',
            'pos_id' => 'exists:pos,id'
        ];
        if($containPassword) {
            $rules['password'] = "string|min:8";
        }

        $request->validate($rules);
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if($containPassword) {
            $user->password = Hash::make($request->password);
        }
        $user->pos_id = $request->pos_id;

        $user->save();
        return redirect()->route('konfigurasi-user.index')->with('message', 'Informasi User berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('konfigurasi-user.index')->with('message', 'User berhasil diihapus!');
    }
}

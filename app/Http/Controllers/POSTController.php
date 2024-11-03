<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class POSTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = UserModel::all();
        return view('user.user', compact('user'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'max 20',
            'username' => 'required',
            'nama' => 'required'
        ]);

        UserModel::create($request->all());
        return redirect()->route('m_user.index')
            ->with('success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = UserModel::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        UserModel::find($id)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('m_user.index')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserModel::findOrFail($id)->delete();
        return redirect()->route('user.user')
            ->with('success', 'data Berhasil Dihapus');
    }
}

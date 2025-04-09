<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dusun;
use Illuminate\Support\Str;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'Data Dusun';
        $dusun = Dusun::all();

        return view('admin.dusun.index', compact('page', 'dusun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Tambah Data Dusun";

        return view('admin.dusun.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dusun' => 'required|string|max:100|unique:dusuns,nama_dusun',
        ]);

        // dd(Str::uuid());
        $id = Str::uuid();
        Dusun::create([
            'dusun_id' => $id,
            'nama_dusun' => $request->nama_dusun,
        ]);

        return redirect()->route('dusun.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(Dusun $dusun)
    {
        $page = "Data Dusun";
        return view('admin.dusun.edit', compact('page', 'dusun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dusun $dusun)
    {
        $request->validate([
            'nama_dusun' => 'required|max:100',
        ]);

        $dusun->update([
            'nama_dusun' => $request->nama_dusun,
        ]);

        return redirect()->route('dusun.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dusun $dusun)
    {
        $dusun->delete();
        return redirect()->route('dusun.index')->with('success', 'Data berhasil dihapus');
    }
}

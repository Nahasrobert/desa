<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RW;
use App\Models\Dusun;
use Illuminate\Support\Str;

class RWController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "Data RW";
        $rw = RW::join('dusuns', 'rws.dusun_id', '=', 'dusuns.dusun_id')
            ->select('rws.*', 'dusuns.nama_dusun')
            ->get();


        return view('admin.rw.index', compact('page', 'rw'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Tambah Data RW";
        $dusun = Dusun::all();


        return view('admin.rw.create', compact('page', 'dusun'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_rw' => 'required',
            'dusun_id' => 'required',
        ]);

        // dd(Str::uuid());
        $id = Str::uuid();
        RW::create([
            'rw_id' => $id,
            'dusun_id' => $request->dusun_id,
            'nomor_rw' => $request->nomor_rw,
        ]);

        return redirect()->route('rw.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(RW $rw)
    {
        $page = "Data RW";
        $dusun = Dusun::all();

        return view('admin.rw.edit', compact('page', 'rw', 'dusun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RW $rw)
    {
        $request->validate([
            'nomor_rw' => 'required',
            'dusun_id' => 'required',
        ]);

        $rw->update([
            'nomor_rw' => $request->nomor_rw,
            'dusun_id' => $request->dusun_id,
        ]);


        return redirect()->route('rw.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RW $rw)
    {
        $rw->delete();
        return redirect()->route('rw.index')->with('success', 'Data berhasil dihapus');
    }
}

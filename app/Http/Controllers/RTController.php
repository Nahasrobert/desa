<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class RTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $page = 'Data RT';
        $rt = RT::join('rws', 'rts.rw_id', '=', 'rws.rw_id')
            ->join('dusuns', 'rws.dusun_id', '=', 'dusuns.dusun_id')
            ->select('rts.*', 'rws.nomor_rw', 'dusuns.nama_dusun')
            ->get();

        return view('admin.rt.index', compact('page', 'rt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'Tambah Data RT';
        $rw = RW::join('dusuns', 'rws.dusun_id', '=', 'dusuns.dusun_id')
            ->select('rws.*', 'dusuns.nama_dusun')
            ->get();

        return view('admin.rt.create', compact('page', 'rw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_rt' => 'required',
            'rw_id' => 'required',
        ]);

        // dd(Str::uuid());
        $id = Str::uuid();
        RT::create([
            'rt_id' => $id,
            'rw_id' => $request->rw_id,
            'nomor_rt' => $request->nomor_rt,
        ]);

        return redirect()->route('rt.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(RT $rt)
    {
        $page = "Data RT";
        $rw = RW::all();

        return view('admin.rt.edit', compact('page', 'rt', 'rw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RT $rt)
    {
        $request->validate([
            'nomor_rt' => 'required',
            'rw_id' => 'required',
        ]);

        $rt->update([
            'nomor_rt' => $request->nomor_rt,
            'rw_id' => $request->rw_id,
        ]);


        return redirect()->route('rt.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RT $rt)
    {
        $rt->delete();
        return redirect()->route('rt.index')->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RT;

use Illuminate\Http\Request;

class RTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $page = 'Data RT';
        $rt = RT::all();

        return view('admin.rt.index', compact('page', 'rt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'Tambah Data RT';

        return view('admin.rt.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

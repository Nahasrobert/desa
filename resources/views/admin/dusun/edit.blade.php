@extends('layout.header')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $page }}</h5>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">
                        <form action="{{ isset($dusun) ? route('dusun.update', $dusun->dusun_id) : route('dusun.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($dusun))
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label>Nama Dusun</label>
                                <input type="text" name="nama_dusun" class="form-control"
                                    value="{{ old('nama_dusun', $dusun->nama_dusun ?? '') }}" required>
                            </div>

                            <button type="submit"s
                                class="btn btn-success mt-2">{{ isset($dusun) ? 'Update' : 'Simpan' }}</button>
                        </form>
                    </div>
                </div>


            </div>
        @endsection

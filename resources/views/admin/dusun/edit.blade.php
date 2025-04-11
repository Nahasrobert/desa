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
                                <input type="text" name="nama_dusun"
                                    class="form-control @error('nama_dusun') is-invalid @enderror"
                                    value="{{ old('nama_dusun', $dusun->nama_dusun ?? '') }}" required>
                                @error('nama_dusun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit"
                                class="btn btn-success mt-2">{{ isset($dusun) ? 'Update' : 'Simpan' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

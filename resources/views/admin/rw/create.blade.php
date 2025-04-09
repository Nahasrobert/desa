@extends('layout.header')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $page }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('rw.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NDusun">Nama Dusun</label>
                                <select class="form-control @error('dusun_id') is-invalid @enderror" id="NDusun"
                                    name="dusun_id">
                                    <option value="">-- Pilih Dusun --</option>
                                    @foreach ($dusun as $g)
                                        <option value="{{ $g->dusun_id }}"
                                            {{ old('dusun_id') == $g->dusun_id ? 'selected' : '' }}>
                                            {{ $g->nama_dusun }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('dusun_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input type="text" id="rw" name="nomor_rw"
                                    class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw') }}"
                                    placeholder="001">
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layout.header')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $page }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('rt.update', $rt->rt_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NRW">Nomor RW</label>
                                <select class="form-control @error('rw_id') is-invalid @enderror" id="NRW"
                                    name="rw_id">
                                    <option value="">-- Pilih RW --</option>
                                    @foreach ($rw as $j)
                                        <option value="{{ $j->rw_id }}"
                                            {{ old('rw_id', $rt->rw_id) == $j->rw_id ? 'selected' : '' }}>
                                            {{ $j->nomor_rw }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rw_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rt">Nomor RT</label>
                                <input type="text" id="rt" name="nomor_rt"
                                    class="form-control @error('rt') is-invalid @enderror"
                                    value="{{ old('rt', $rt->nomor_rt) }}">
                                @error('rt')
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

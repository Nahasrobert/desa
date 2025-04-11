@extends('layout.header')
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5>{{ $page }}</h5>
                    <span class="d-block m-t-5" style="font-size: 12px">
                        Olah {{ $page }} dengan benar!
                    </span>
                </div>
                <a href="{{ route('rt.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah RT
                </a>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table id="Table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor RT</th>
                                <th>Nomor RW</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rt as $r)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $r->nomor_rt }}</td>
                                    <td>{{ $r->nomor_rw }} - {{ $r->nama_dusun }}</td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('rt.edit', $r->rt_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>

                                            <form action="{{ route('rt.destroy', $r->rt_id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin mau hapus data ini?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

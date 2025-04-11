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
                <a href="{{ route('rw.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah RW
                </a>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table id="Table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dusun</th>
                                <th>Nomor RW</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rw as $w)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $w->nama_dusun }}</td>
                                    <td>{{ $w->nomor_rw }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Aksi">
                                            <a href="{{ route('rw.edit', $w->rw_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>

                                            <form action="{{ route('rw.destroy', $w->rw_id) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus?')" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
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
    </div>
@endsection

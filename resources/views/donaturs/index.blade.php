@extends('layouts.header')
@section('title', 'Daftar Donatur')
{{-- DASHBOARD ADMIN --}}

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Donatur</h1>
        <div class="row">
            <div class="col-12">
                @if ($donaturs->isEmpty())
                    <p class="text-center">Belum ada donatur.</p>
                @else
                    <div class="container-xxl">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>Pesan</th>
                                    <th class="text-center">Jumlah Donasi</th>
                                    <th class="text-center">Metode</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donaturs as $donatur)
                                    <tr>
                                        <td>{{ $donatur->nama }}</td>
                                        <td>{{ $donatur->pesan }}</td>
                                        <td>Rp. {{ number_format($donatur->total_donasi, 0, ',', '.') }}</td>
                                        <td>{{ $donatur->tipe_bayar }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('donaturs.destroy', $donatur->id) }}" method="POST">
                                                <a href="{{ route('donaturs.edit', $donatur->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal{{ $donatur->id }}">HAPUS</button>

                                                {{-- Notif Modal --}}
                                                <div class="modal fade" id="deleteModal{{ $donatur->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    Konfirmasi Hapus Donatur</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus donatur ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.096), 0 6px 30px rgba(0, 0, 0, 0.096);
        }
    </style>
@endsection

@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')

<div class="container">

    <h2 class="mb-4">
        <i class="bi bi-file-text"></i>
        Detail Transaksi
    </h2>

    <div class="card">
        <div class="card-body">

            <table class="table">
                <tr>
                    <th width="220">Kode Transaksi</th>
                    <td>{{ $transaksi->kode_transaksi }}</td>
                </tr>

                <tr>
                    <th>Nama Anggota</th>
                    <td>{{ $transaksi->anggota->nama }}</td>
                </tr>

                <tr>
                    <th>Judul Buku</th>
                    <td>{{ $transaksi->buku->judul }}</td>
                </tr>

                <tr>
                    <th>Tanggal Pinjam</th>
                    <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
                </tr>

                <tr>
                    <th>Batas Pengembalian</th>
                    <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{ $transaksi->status }}</td>
                </tr>
                
                @if($transaksi->status == 'Dikembalikan')

                <tr>
                    <th>Hari Terlambat</th>
                    <td>
                        @php
                            $hari = \Carbon\Carbon::parse($transaksi->tanggal_kembali)
                                    ->diffInDays($transaksi->tanggal_dikembalikan, false);
                        @endphp

                        @if($hari > 0)
                            {{ $hari }} Hari
                        @else
                            Tidak Terlambat
                        @endif
                    </td>
                </tr>

                @endif
            </table>
        </div>
    </div>
    <div class="mt-3">

        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
            Kembali
        </a>

        @if($transaksi->status == 'Dipinjam')

            <form action="{{ route('transaksi.kembalikan', $transaksi->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('PUT')

                <button type="submit"
                        class="btn btn-success"
                        onclick="return confirm('Yakin buku ini akan dikembalikan?')">Kembalikan Buku
                </button>

            </form>

        @else

            <span class="btn btn-success disabled">
                Buku Sudah Dikembalikan
            </span>

        @endif
    </div>
</div>

@endsection
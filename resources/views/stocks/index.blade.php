@extends('layout')

@section('title', 'Daftar Stok')

@section('content')
    <h1>Daftar Stok</h1>
    <a href="{{ route('stocks.create') }}">Tambah Stok</a>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stocks as $stock)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ optional($stock->product)->name ?? $stock->id_products }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>
                        <a href="{{ route('stocks.show', $stock->id) }}">Detail</a>
                        <a href="{{ route('stocks.edit', $stock->id) }}">Edit</a>
                        <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data stok ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data stok.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
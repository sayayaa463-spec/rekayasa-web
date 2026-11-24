@extends('layout')

@section('title', 'Daftar Transaksi')

@section('content')
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('transactions.create') }}">Tambah Transaksi</a>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ optional($transaction->product)->name ?? $transaction->id_products }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->total_price }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->id) }}">Detail</a>
                        <a href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
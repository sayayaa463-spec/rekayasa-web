@extends('layout')

@section('content')
    <h2>Tambah Transaksi</h2>

    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div>
            <label>Produk</label><br>
            <select name="id_products" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Jumlah</label><br>
            <input type="number" name="quantity" min="1" required>
        </div>
        <br>
        <div>
            <label>Status</label><br>
            <select name="status">
                <option value="0">0 - Pending</option>
                <option value="1">1 - Selesai</option>
            </select>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('transactions.index') }}">Kembali</a>
    </form>
@endsection
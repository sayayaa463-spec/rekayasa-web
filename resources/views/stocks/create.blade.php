@extends('layout')

@section('content')
    <h2>Tambah Stok</h2>

    <form method="POST" action="{{ route('stocks.store') }}">
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
            <label>Jumlah Stok</label><br>
            <input type="number" name="quantity" min="1" required>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('stocks.index') }}">Kembali</a>
    </form>
@endsection
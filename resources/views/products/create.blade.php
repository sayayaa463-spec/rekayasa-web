@extends('layout')

@section('content')
    <h2>Tambah Produk</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 12px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div>
            <label>Nama Produk</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <div>
            <label>Harga</label><br>
            <input type="number" name="price" value="{{ old('price') }}" min="0" required>
        </div>
        <br>
        <div>
            <label>Stok</label><br>
            <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required>
        </div>
        <br>
        <div>
            <label>Deskripsi</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('products.index') }}">Kembali</a>
    </form>
@endsection
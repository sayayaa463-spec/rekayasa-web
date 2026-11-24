@extends('layout')

@section('content')
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 12px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Produk</label><br>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </div>
        <br>
        <div>
            <label>Harga</label><br>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" required>
        </div>
        <br>
        <div>
            <label>Stok</label><br>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required>
        </div>
        <br>
        <div>
            <label>Deskripsi</label><br>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>
        <br>
        <button type="submit">Update</button>
        <a href="{{ route('products.index') }}">Kembali</a>
    </form>
@endsection
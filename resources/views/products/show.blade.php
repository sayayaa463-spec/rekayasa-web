@extends('layout')

@section('content')
    <h2>Detail Produk</h2>

    <p><strong>Nama Produk:</strong> {{ $product->name }}</p>
    <p><strong>Harga:</strong> {{ $product->price }}</p>
    <p><strong>Stok:</strong> {{ $product->stock }}</p>
    <p><strong>Deskripsi:</strong> {{ $product->description ?? '-' }}</p>

    <br>
    <a href="{{ route('products.edit', $product->id) }}">Edit</a> |
    <a href="{{ route('products.index') }}">Kembali ke Daftar</a>
@endsection
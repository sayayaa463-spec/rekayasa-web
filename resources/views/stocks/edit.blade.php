@extends('layout')

@section('content')
    <h2>Edit Stok</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 12px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('stocks.update', $stock->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Produk</label><br>
            <select name="id_product" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('id_product', $stock->id_product ?? $stock->product_id) == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Jumlah / Stok</label><br>
            <input type="number" name="quantity" value="{{ old('quantity', $stock->quantity) }}" min="0" required>
        </div>
        <br>
        <button type="submit">Update</button>
        <a href="{{ route('stocks.index') }}">Kembali</a>
    </form>
@endsection
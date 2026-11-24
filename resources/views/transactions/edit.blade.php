@extends('layout')

@section('content')
    <h2>Edit Transaksi</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 12px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Produk</label><br>
            <select name="id_products" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('id_products', $transaction->id_products ?? $transaction->product_id) == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <div>
            <label>Jumlah</label><br>
            <input type="number" name="quantity" value="{{ old('quantity', $transaction->quantity) }}" min="1" required>
        </div>
        <br>

        <div>
            <label>Status</label><br>
            <select name="status">
                <option value="1" {{ old('status', $transaction->status ?? '') == '1' ? 'selected' : '' }}>1 - Selesai</option>
                <option value="0" {{ old('status', $transaction->status ?? '') == '0' ? 'selected' : '' }}>0 - Pending</option>
            </select>
        </div>
        <br>

        <button type="submit">Update</button>
        <a href="{{ route('transactions.index') }}">Kembali</a>
    </form>
@endsection
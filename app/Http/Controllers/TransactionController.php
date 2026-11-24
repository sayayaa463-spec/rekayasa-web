<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'nullable',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('product');
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $products = Product::all();
        return view('transactions.edit', compact('transaction', 'products'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'nullable',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
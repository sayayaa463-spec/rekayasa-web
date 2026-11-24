<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->latest()->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stocks.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Stock::create($validated);

        return redirect()->route('stocks.index')->with('success', 'Data stok berhasil ditambahkan.');
    }

    public function show(Stock $stock)
    {
        $stock->load('product');
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $products = Product::all();
        return view('stocks.edit', compact('stock', 'products'));
    }

    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $stock->update($validated);

        return redirect()->route('stocks.index')->with('success', 'Data stok berhasil diperbarui.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Data stok berhasil dihapus.');
    }
}
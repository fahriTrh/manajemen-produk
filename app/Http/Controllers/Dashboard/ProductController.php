<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    private ProductService $product_service;

    public function __construct()
    {
        $this->product_service = new ProductService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.product.index', [
            'products' => Product::latest()->get(),
            'title' => 'product'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->product_service->store($request)) {
            return redirect('/product')->with('success_c', 'Data berhasil ditambahkan');
        }

        return back()->with('failed_c', 'Data gagal ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if ($this->product_service->update($request, $product)) {
            return redirect('/product')->with('success_u', 'Data berhasil diubah');
        }
        return back()->with('failed_u', 'Data gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($this->product_service->destroy($product)) {
            return redirect('/product')->with('success_d', 'Data berhasil dihapus');
        }
        return back()->with('failed_d', 'Data gagal dihapus');
    }
}

<?php

namespace Naykel\Shopit\Controllers;

use App\Http\Controllers\Controller;
use Naykel\Shopit\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->active()->get();

        return view('shopit::products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('shopit::products.show', compact('product'));
    }
}

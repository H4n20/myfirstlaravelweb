<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12); // Hiển thị 12 sản phẩm mỗi trang
        return view('frontend.shop.index', compact('products'));
    }
}

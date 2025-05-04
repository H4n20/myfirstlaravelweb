<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('id_product', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('status') && $request->status != 0) {
            $status = $request->status == 1 ? 'available' : 'unavailable';
            $query->where('status', $status);
        }
        if ($request->filled('brand') && $request->brand != 0) {
            $brands = [
                1 => 'DELL',
                2 => 'ASUS',
                3 => 'Acer',
            ];
            $query->where('brand', $brands[$request->brand] ?? null);
        }

        if ($request->filled('price') && $request->price != 0) {
            switch ($request->price) {
                case 1:
                    $query->whereBetween('price', [0, 100]);
                    break;
                case 2:
                    $query->whereBetween('price', [100, 200]);
                    break;
                case 3:
                    $query->whereBetween('price', [200, 300]);
                    break;
                case 4:
                    $query->whereBetween('price', [300, 400]);
                    break;
                case 5:
                    $query->whereBetween('price', [400, 500]);
                    break;
                case 6:
                    $query->whereBetween('price', [500, 600]);
                    break;
                case 7:
                    $query->whereBetween('price', [600, 700]);
                    break;
            }
        }
        $products = $query->paginate(20);
        $config['seo'] = config('apps.product');
        $template = 'backend.product.index';
        return view(
            'backend.dashboard.layout',
            compact('template', 'products', 'config')
        );
    }
    public function create()
    {
        $config['seo'] = config('apps.product');
        $config['method'] = 'create';
        $products = Product::paginate(20);
        $template = 'backend.product.store';
        return view(
            'backend.dashboard.layout',
            compact('template', 'config')
        );
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->id_product = $request->id_product;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        return redirect()->route('product.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $config['seo'] = config('apps.product');
        $config['method'] = 'edit';
        $product = Product::findOrFail($id);
        $template = 'backend.product.store';
        return view(
            'backend.dashboard.layout',
            compact('template', 'product', 'config')
        );
    }

    public function update($id, ProductUpdateRequest $request)
    {
        $product = Product::findOrFail($id);
        $product->id_product = $request->id_product;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        return redirect()->route('product.index')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'User deleted successfully!');
    }
}
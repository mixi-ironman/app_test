<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; 
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function apiList()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = 'image'.time().'-'.uniqid().'.'.$request->file('image')->extension();
            // Cách 1: Sử dụng move() để lưu hình ảnh vào thư mục public/uploads
            $request->file('image')->move(public_path('uploads'), $imagePath);
            
        } else {
            $imagePath = null; 
        }
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'product_price' => $request->input('product_price'),
            'product_image' => $imagePath,
        ]);
        
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        // Xử lý file hình ảnh nếu người dùng tải lên hình ảnh mới
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = 'image'.time().'-'.uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('uploads'), $imagePath);
            // Xóa hình ảnh cũ nếu có
            if ($product->image && file_exists(public_path('uploads/' . $product->image))) {
                unlink(public_path('uploads/' . $product->image));
            }
        } else {
            // Nếu người dùng không tải lên hình ảnh mới, giữ nguyên đường dẫn hình ảnh hiện tại
            $imagePath = $product->product_image;
        }

        $product->update([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'product_price' => $request->input('product_price'),
            'product_image' => $imagePath,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function home()
    {
        $products = Product::all();
        return view('client.layouts.pages.home',['products' => $products]);
    }
}

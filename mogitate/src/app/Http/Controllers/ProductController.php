<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $sort = $request->input('sort');

        $query = Product::query();

        if ($sort === 'asc') {
        $query->orderBy('price', 'asc');
        } elseif ($sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->simplePaginate(6);

        return view('products', compact('products', 'sort'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.detail', compact('product'));
    }
    public function register()
    {
        return view('register');



    }
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();


        Product::create([
        'name' => $validated['name'],
        'price' => $validated['price'],
        'image' => basename($request->file('image')->store('images', 'public')),
        'season' => $validated['season'],
        'content' => $validated['content'],
        ]);

        return redirect()->route('products')->with('success', '商品を登録しました！');
    }
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        } else {
            $validated['image'] = $product->image;
        }

        $product->update($validated);

        return redirect()->route('products')->with('success', '商品を更新しました！');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $keyword = mb_convert_kana($request->input('keyword'), 'K');

        $products = Product::where('name', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%")
                    ->simplePaginate(6);

        return view('products', compact('products', 'keyword'));
    }
}

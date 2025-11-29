<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request)
{
    $keyword = $request->input('keyword');
    $sort = $request->input('sort');  // 並び順（high / low）

    $query = Product::query();

    // 🔍 キーワード検索
    if (!empty($keyword)) {
        $query->where('name', 'like', "%{$keyword}%");
    }

    // 💰 並び替え
    if ($sort === 'high') {
        $query->orderBy('price', 'desc');
    } elseif ($sort === 'low') {
        $query->orderBy('price', 'asc');
    } else {
        $query->orderBy('id', 'desc');
    }

    $products = $query->paginate(6);

    return view('index', compact('products', 'keyword', 'sort'));
}

    public function create()
    {
        return view('touroku'); // resources/views/touroku.blade.php を返す
    }
    public function store(Request $request)
    {
    // バリデーション
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'required|image'
    ]);

    // 画像保存
    $path = $request->file('image')->store('images', 'public');

    // DB登録
    Product::create([
        'name'  => $request->name,
        'price' => $request->price,
        'image' => $path
    ]);

    return redirect()->route('products.index')->with('success', '登録');
    }
}
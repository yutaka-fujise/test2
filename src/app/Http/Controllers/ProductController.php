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

    $products = $query->paginate(6)
    ->appends(request()->query());

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
    'name'        => 'required',
    'price'       => ['required', 'numeric', 'between:0,10000'],
    'image'       => ['required', 'mimes:jpeg,png,jpg', 'max:4096'],
    'season'      => 'required|array',
    'description' => ['required','string','max:120']
],[
    'name.required'        => '商品名は必ず入力してください。',
    'price.required'       => '価格は必須です。',
    'price.numeric'        => '価格は数値で入力してください。',
    'price.between'        => '価格は0〜10000円の範囲で入力してください。',
    'image.required'       => '画像を選択してください。',
    'image.mimes'          => 'アップロードできる画像は jpg / jpeg / png のみです。',
    'image.max'            => '画像サイズは4MB以内にしてください。',
    'season.required'      => '季節を1つ以上選択してください。',
    'description.required' => '商品説明を入力してください。',
    'description.max'      => '商品説明は120文字以内で入力してください。',
]);

    // 画像保存
    $path = $request->file('image')->store('images', 'public');

    // DB登録
    Product::create([
        'name'        => $request->name,
        'price'       => $request->price,
        'image'       => $path,
        'season'      => implode(',', $request->season),
        'description' => $request->description,
    ]);

    return redirect()->route('products.index')->with('success', '登録完了');
    }

    public function show($id)
{
    $product = Product::findOrFail($id);

    // 🔥 ここで複数選択用に配列化（絶対必要）
    $product->season = explode(',', $product->season);

    return view('show', compact('product'));
}

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name'        => 'required',
        'price'       => 'required|numeric',
        'image'       => 'nullable|mimes:jpg,jpeg,png|max:2048',
        'season'      => 'required|array',
        'description' => 'required'
    ]);

    $product = Product::findOrFail($id);

    $product->name        = $request->name;
    $product->price       = $request->price;
    $product->season      = implode(',', $request->season);  // ←重要！！
    $product->description = $request->description;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $product->image = $path;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', '商品を更新しました！');
    }


    public function destroy($id)
    {
    $product = Product::findOrFail($id);

    // 画像も削除（ストレージ保存してるなら推奨）
    if ($product->image && \Storage::exists('public/' . $product->image)) {
        \Storage::delete('public/' . $product->image);
    }

    $product->delete();

    return redirect()->route('products.index')
        ->with('success', '商品を削除しました！');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 商品登録フォーム表示
    public function create()
    {
        return view('touroku'); // resources/views/touroku.blade.php を返す
    }

    // 必要なら他メソッドもここに追加...

    public function index()
    {
    // 商品一覧を表示するページに移動させる
    return view('index');  // index.blade.php を表示
    }
}
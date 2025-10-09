<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
// use文　外部ファイルよりクラスやメソッド使用する文
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// getリクエストに対しﾙｰﾃｨﾝｸﾞ設定する文
Route::get('/', [ContactController::class, 'index']);
// パスパラメータ設定文
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
// 送信ボタン押下後confirm アクションが実行するルーティング設定文
Route::post('/contacts', [ContactController::class, 'store']);
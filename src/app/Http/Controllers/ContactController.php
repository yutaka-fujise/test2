<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
// ContactRequest を使うことを宣言
 use App\Models\Contact;
//  保存処理

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }


//  public function confirm(Request $request)
//  formタグから送られてきた値を取り出す
  public function confirm(ContactRequest $request)
  // confirmアクション バリデーションを設定
 {
 $contact = $request->only(['name', 'email', 'tel', 'content']);
// 名前、メールアドレス、電話番号、お問い合わせ内容の四つの情報を取得するための指定キー
//  return $contact;
    // return view('confirm');→viewファイルを呼び出す処理
    return view('confirm', ['contact' => $contact]);
    // view ファイル側で連想配列のキーを指定することで、そのキーに対応した値を表示→入力情報が入った変数$contactを contact というキーで渡す
 }
//  public function store(Request $request)
  public function store(ContactRequest $request)
  // storeアクションにバリデーションを設定
  {
  $contact = $request->only(['name', 'email', 'tel', 'content']);
  // confirm.blade.php の formタグから送信された値を受け取る
   Contact::create($contact);
  //  Contact モデルを使った、データの保存処理のコード
   return view('thanks');
  //  保存処理が終わったら、お問合せ完了ページに遷移
}
}
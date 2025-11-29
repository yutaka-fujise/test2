<?php

return [

    'required' => ':attribute を入力してください。',
    'max'      => [
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],
    'min'      => [
        'numeric' => ':attribute は :min 以上で入力してください。',
    ],
    'numeric'  => ':attribute は数値で入力してください。',
    'image'    => ':attribute は画像ファイルを選択してください。',
    'mimes'    => ':attribute は jpg または png 形式でアップロードしてください。',
    'between'  => [
        'numeric' => ':attribute は :min〜:max の範囲で入力してください。',
    ],

    // 属性名の日本語化
    'attributes' => [
        'name'        => '商品名',
        'price'       => '値段',
        'image'       => '商品画像',
        'description' => '商品説明',
        'season'      => '季節',
    ],
];

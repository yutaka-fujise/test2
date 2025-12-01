<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <link rel="stylesheet" href="{{ asset('css/touroku.css') }}">
</head>
<body>

<header class="header">
    <div class="logo">mogitate</div>
</header>

<main class="form-wrapper">

    <h1>商品登録</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- 商品名 -->
        <label>商品名 <span class="required">必須</span></label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
        @error('name')
        <p class="error-text">{{ $message }}</p>
        @enderror

        <!-- 価格 -->
        <label>価格 <span class="required">必須</span></label>
        <input type="number" name="price" value="{{ old('price') }}" placeholder="価格を入力">
        @error('price')
        <p class="error-text">{{ $message }}</p>
        @enderror

        <!-- 商品画像 -->
        <label>商品画像 <span class="required">必須</span></label>
        <input type="file" name="image" accept=".jpg,.jpeg,.png">
        @error('image')
            <p class="error-text">{{ $message }}</p>
        @enderror

        <!-- 季節 -->
        <label>季節 <span class="required">必須</span> <span class="ref">複数選択可</span></label>
        <div class="season-box">
            <label>
                <input type="checkbox" name="season[]" value="春"
                {{ in_array('春', old('season', [])) ? 'checked' : '' }}>春
            </label>
            <label>
                <input type="checkbox" name="season[]" value="夏"
                {{ in_array('夏', old('season', [])) ? 'checked' : '' }}>夏
            </label>
            <label>
                <input type="checkbox" name="season[]" value="秋"
                {{ in_array('秋', old('season', [])) ? 'checked' : '' }}>秋
            </label>
            <label>
                <input type="checkbox" name="season[]" value="冬"
                {{ in_array('冬', old('season', [])) ? 'checked' : '' }}>冬
            </label>
            @error('season')
        <p class="error-text">{{ $message }}</p>
        @enderror
        </div>

        <!-- 商品説明 -->
        <label>商品説明 <span class="required">必須</span></label>
        <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
        @error('description')
        <p class="error-text">{{ $message }}</p>
        @enderror

        <!-- ボタン -->
        <div class="btn-area">
            <a href="{{ route('products.index') }}" class="btn-gray">戻る</a>
            <button type="submit" class="submit-btn">登録</button>
        </div>

    </form>
</main>

</body>
</html>

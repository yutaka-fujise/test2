<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>商品一覧</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/show.css') }}" />
</head>

<body>

<header class="header">
    <div class="logo">mogitate</div>
</header>

<main>
    <div class="edit-container">

    <div class="breadcrumbs">
        <a href="{{ route('products.index') }}">商品一覧</a> > {{ $product->name }}
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grid">

            {{-- 左：画像 --}}
            <div class="left-box">
                <label class="form-label">商品画像</label>
                <div class="image-preview">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="">
                </div>
                <input type="file" name="image">
            </div>

            {{-- 右：商品名・値段・季節 --}}
            <div class="right-box">

                <label class="form-label">商品名</label>
                <input type="text" name="name" value="{{ $product->name }}">

                <label class="form-label">値段</label>
                <input type="number" name="price" value="{{ $product->price }}">

                <label class="form-label season-label">季節</label>
                <div class="radio-group">
                    <label><input type="radio" name="season" value="春" @checked($product->春</label>
                    <label><input type="radio" name="season" value="夏" @checked($product->夏</label>
                    <label><input type="radio" name="season" value="秋" @checked($product->秋</label>
                    <label><input type="radio" name="season" value="冬" @checked($product->冬</label>
                </div>

            </div>
        </div>

        {{-- 説明 --}}
        <label class="form-label">商品説明</label>
        <textarea name="description" rows="6">{{ $product->description }}</textarea>

        {{-- ボタン --}}
        <div class="btn-area">
            <a href="{{ route('products.index') }}" class="back-btn">戻る</a>
            <button type="submit" class="save-btn">変更を保存</button>
        </div>

    </form>
</div>
</main>
</body>
</html>
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
            <div class="form-section">
    <label>商品画像</label>

    {{-- ▼プレビュー画像（初期は登録済み画像を表示） --}}
    <img id="preview" src="{{ asset('storage/' . $product->image) }}" 
         style="width:200px; height:200px; object-fit:cover; border-radius:6px; display:block; margin-bottom:10px;">

    {{-- ▼ファイル選択 --}}
    <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
</div>

            {{-- 右：商品名・値段・季節 --}}
            <div class="right-box">

                <label class="form-label">商品名</label>
                <input type="text" name="name" value="{{ $product->name }}">
                @error('name')
                    <p class="error-text">{{ $message }}</p>
                @enderror

                <label class="form-label">値段</label>
                <input type="number" name="price" value="{{ $product->price }}">
                @error('price')
                    <p class="error-text">{{ $message }}</p>
                @enderror

                <label class="form-label season-label">季節</label>
                <div class="radio-group">
                    <label><input type="checkbox" name="season[]" value="春" @checked($product->春</label>
                    <label><input type="checkbox" name="season[]" value="夏" @checked($product->夏</label>
                    <label><input type="checkbox" name="season[]" value="秋" @checked($product->秋</label>
                    <label><input type="checkbox" name="season[]" value="冬" @checked($product->冬</label>
                @error('season')
                    <p class="error-text">{{ $message }}</p>
                @enderror
                </div>

            </div>
        </div>

        {{-- 説明 --}}
        <label class="form-label">商品説明</label>
        <textarea name="description" rows="6">{{ $product->description }}</textarea>
        @error('description')
            <p class="error-text">{{ $message }}</p>
        @enderror

        {{-- ボタン --}}
        <div class="btn-area">
    <a href="{{ route('products.index') }}" class="back-btn">戻る</a>

    <button type="submit" class="save-btn">変更を保存</button>
    </form>
    {{-- 🗑 削除ボタン --}}
        <form action="{{ route('products.destroy',          $product->id) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-btn" onclick="return confirm('本当に削除しますか？')">
            🗑
        </button>
    </form>
    </div>
    
<script>
function previewImage(e){
    const file = e.target.files[0];
    if(!file) return;

    const reader = new FileReader();
    reader.onload = function(event){
        document.getElementById('preview').src = event.target.result;
    };
    reader.readAsDataURL(file);
}
</script>

</main>

</body>

</html>
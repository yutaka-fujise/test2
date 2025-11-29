<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>商品一覧</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>

<header class="header">
    <div class="logo">mogitate</div>
</header>
<main class="container">

    <aside class="sidebar">

    <h3>商品一覧</h3>

    {{-- 🔍 検索フォーム & 並び替えフォーム一体型 --}}
    <form action="{{ route('products.index') }}" method="GET">

        {{-- 🔍 キーワード検索 --}}
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="商品名で検索">
        <button type="submit" class="search-btn">検索</button>

        <div class="sort-area">
            <label>価格順で表示</label>

            <select name="sort">
                <option value="">選択してください</option>
                <option value="high" {{ (isset($sort) && $sort=='high') ? 'selected' : '' }}>高い順に表示</option>
                <option value="low"  {{ (isset($sort) && $sort=='low')  ? 'selected' : '' }}>安い順に表示</option>
            </select>

            <button type="submit" class="sort-btn">並び替え</button>
        </div>

    </form>

</aside>

    <section class="content">

    <div class="top-bar">
        <h2>商品一覧</h2>
       <a href="{{ route('products.create') }}" class="add-btn">＋ 商品を追加</a>
    </div>

    <div class="items">
         @foreach($products as $product)
        <div class="item">
            <img src="{{ asset('storage/' . $product->image) }}">
            <p class="name">{{ $product->name }}</p>
            <p class="price">¥{{ number_format($product->price) }}</p>
        </div>
        @endforeach
        </div>

        {{-- ページネーション数字リンク --}}
@if ($products->hasPages())
    <div class="pagination-container">
        <ul class="pagination">
            {{-- 前へ --}}
            @if ($products->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $products->previousPageUrl() }}">&laquo;</a></li>
            @endif

            {{-- ページ番号 --}}
            @foreach ($products->links()->elements[0] ?? [] as $page => $url)
                @if ($page == $products->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- 次へ --}}
            @if ($products->hasMorePages())
                <li><a href="{{ $products->nextPageUrl() }}">&raquo;</a></li>
            @else
                <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    </div>
@endif
    </section>

</main>

</body>

</html>

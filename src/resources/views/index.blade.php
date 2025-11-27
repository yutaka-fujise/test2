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

        <div class="search-area">
            <input type="text" placeholder="商品名で検索">
            <button class="search-btn">検索</button>
        </div>

        <div class="sort-area">
            <label>価格順で表示</label>
            <select>
                <option>高い順に表示</option>
                <option>安い順に表示</option>
            </select>
            <button class="sort-btn">高い順に表示</button>
        </div>

    </aside>

    <section class="content">

    <div class="top-bar">
        <h2>商品一覧</h2>
        <a href="{{ route('products.create') }}" class="add-btn">＋ 商品を追加</a>
    </div>

    <div class="items">

            <div class="item">
                <img src="img/muscat.png">
                <p class="name">シャインマスカット</p>
                <p class="price">¥1400</p>
            </div>

            <div class="item">
                <img src="img/strawberry.png">
                <p class="name">ストロベリー</p>
                <p class="price">¥1200</p>
            </div>

            <div class="item">
                <img src="img/peach.png">
                <p class="name">ピーチ</p>
                <p class="price">¥1000</p>
            </div>

            <div class="item">
                <img src="img/orange.png">
                <p class="name">オレンジ</p>
                <p class="price">¥850</p>
            </div>

            <div class="item">
                <img src="img/kiwi.png">
                <p class="name">キウイ</p>
                <p class="price">¥800</p>
            </div>

            <div class="item">
                <img src="img/watermelon.png">
                <p class="name">スイカ</p>
                <p class="price">¥700</p>
            </div>

        </div>

        <div class="pagination">
            <ul>
                <li class="active">1</li>
                <li>2</li>
                <li>3</li>
            </ul>
        </div>
    </section>

</main>

</body>

</html>

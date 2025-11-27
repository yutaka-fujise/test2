<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>mogitate</h1>
</header>

<div class="container">

    <aside class="sidebar">
        <h2>商品一覧</h2>
        <input type="text" placeholder="商品名で検索" class="search-box">
        <button class="search-btn">検索</button>

        <label class="sort-label">価格順で表示</label>
        <select class="sort-select">
            <option>価格で並べ替え</option>
            <option>安い順</option>
            <option>高い順</option>
        </select>
    </aside>

    <main>

        <div class="add-btn-wrapper">
            <button class="add-btn">＋ 商品を追加</button>
        </div>

        <div class="product-grid">
            <div class="card">
                <img src="kiwi.jpg" alt="キウイ">
                <p class="name">キウイ</p>
                <p class="price">¥800</p>
            </div>
            <div class="card">
                <img src="strawberry.jpg" alt="ストロベリー">
                <p class="name">ストロベリー</p>
                <p class="price">¥1200</p>
            </div>
            <div class="card">
                <img src="orange.jpg" alt="オレンジ">
                <p class="name">オレンジ</p>
                <p class="price">¥850</p>
            </div>
            <div class="card">
                <img src="suika.jpg" alt="スイカ">
                <p class="name">スイカ</p>
                <p class="price">¥700</p>
            </div>
            <div class="card">
                <img src="peach.jpg" alt="ピーチ">
                <p class="name">ピーチ</p>
                <p class="price">¥1000</p>
            </div>
            <div class="card">
                <img src="grape.jpg" alt="シャインマスカット">
                <p class="name">シャインマスカット</p>
                <p class="price">¥1400</p>
            </div>
        </div>

        <div class="pagination">
            <span class="page active">1</span>
            <span class="page">2</span>
            <span class="page">3</span>
        </div>

    </main>

</div>

</body>
</html>

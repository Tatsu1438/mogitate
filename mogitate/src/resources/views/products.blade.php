@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('header')
@endsection

@section('content')
    <div style="width: auto;">
        <div style="display: flex; justify-content: space-between; align-items: center width: 40%;">
            @if (isset($keyword))
            <h2>「{{ $keyword }}」の商品一覧</h2>
            @else
            <h2>商品一覧</h2>
            @endif
            <a href="{{ route('register') }}">
                <button class="add-btn">＋商品を追加</button>
            </a>
        </div>
        <div style="width: auto; display: flex;">
            <div style="width: 40%; text-align: center;">
                <div style="width: 100%; height: 40%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                    <form action="{{ route('products.search') }}" method="GET">
                        <div>
                            <input class="product-search" type="text" name="keyword" placeholder="商品を検索" />
                        </div>
                        <div>
                            <button class="search-btn" type="submit">検索</button>
                        </div>
                    </form>
                    <div style="margin: 50px;"></div>
                    <form action="" method="GET">
                        <div class="price-label" style="margin-bottom: 8px;">
                            <label for="sort">価格順で表示</label>
                        </div>
                        <div>
                            <select class="order-select" name="sort" id="sort" onchange="this.form.submit()">
                                <option value="">選択してください</option>
                                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : ''}}>価格が安い順</option>
                                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : ''}}>価格が高い順</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div style="width: 100%; height: 60%;"></div>
            </div>
        <div style="display: flex; flex-wrap: wrap; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
            @foreach ($products as $product)
            <a href="{{ route('products.detail', $product->id) }}">
                <div style="box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2); border-radius: 8px; margin: 8px; width: 320px;">
                    <img src="{{ asset('storage/images/'. $product->image) }}" alt="画像" style="width: 320px; height: 205px; object-fit: cover;">
                    <div style="display: flex; justify-content: space-between; width: 320px;">
                        <p style="margin: 10px;">{{ $product->name }}</p>
                        <p style="margin: 10px;">¥{{ $product->price }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>


    </div>

@endsection
@section('footer')
    <div style="display: flex; justify-content: center;">
        <div class="pagination" style="font-size: 12px;" >
            {{ $products->links() }}
        </div>
    </div>
@endsection

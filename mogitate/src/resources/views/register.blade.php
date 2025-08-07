@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
@endsection

@section('content')
    <div style="margin-bottom: 80px;"></div>
        <div style="display: flex; justify-content: space-between;">
            <div style="width: 250px;"></div>
            <div style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); margin-left: 60px; margin-right: 60px; width: 600px; padding-left: 10px; padding-right: 10px;">
                <h2>商品登録</h2>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 10px;">
                        <label for="name">商品名</label><span style="color: red; font-size: 12px;">※必須</span>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <input  class="product-name" type="text" name="name" placeholder="商品名を入力" style=" width: 95%;">
                    @error('name')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label for="price">値段</label><span style="color: red; font-size: 12px;">※必須</span>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <input  class="product-price" type="text"  name="price" placeholder="値段を入力" style="width: 95%;">
                    @error('price')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div>
                        <label for="image">商品画像</label><span style="color: red; font-size: 12px;">※必須</span>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <input type="file" name="image">
                    @error('image')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div>
                        <div style=" margin-bottom: 10px;">
                            <label for="season">季節</label><span style="color: red; font-size: 12px;">※必須</span><span style="color: gray; font-size: 12px;">※複数選択可</span>
                        </div>
                        <div>
                            <input type="checkbox" name="season[]" value="spring" id="spring" {{ in_array('spring', old('season', $product->season ?? [])) ? 'checked' : '' }} >
                            <label for="spring">春</label>

                            <input type="checkbox" name="season[]" value="summer" id="summer" {{ in_array('summer', old('season', $product->season ?? [])) ? 'checked' : '' }} >
                            <label for="summer">夏</label>

                            <input type="checkbox" name="season[]" value="autumn" id="autumn" {{ in_array('autumn', old('season', $product->season ?? [])) ? 'checked' : '' }} >
                            <label for="autumn">秋</label>

                            <input type="checkbox" name="season[]" value="winter" id="winter" {{ in_array('winter', old('season', $product->season ?? [])) ? 'checked' : '' }} >
                            <label for="winter">冬</label>

                            @error('season')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="margin-top: 20px; width: 100%; margin-bottom: 10px;">
                        <label for="content" name="content">商品説明</label><span style="color: red; font-size: 12px;">※必須</span>
                    </div>
                    <div>
                        <textarea name="content" id="content" rows="10" cols="40" maxlength="250" placeholder="商品の説明を入力" style="width: 100%; border-radius: 8px;"></textarea>
                    @error('content')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                    </div>

                    <div style="display: flex; justify-content: center; margin-bottom: 30px; margin-top: 30px;">
                        <div style="border: solid; width: 130px; margin-right: 10px; border-radius: 8px; padding: 3px; background-color: lightgray; text-align: center;">
                            <a href="{{ route('products') }}">戻る
                            </a>
                        </div>
                        <div>
                            <button type="submit" style="border: solid; width: 150px; border-radius: 8px; padding: 6px; background-color: gold;">登録</button>
                        </div>
                    </div>
                </form>
            </div>
        <div style="width: 250px;"></div>
    </div>
    
@endsection

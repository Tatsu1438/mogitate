@extends('layouts.layout')

@section('css')
@endsection

@section('header')
@endsection

@section('content')
    <div style="display: flex;">
        <div style="width: 370px;"></div>
        <div>
            <h2>商品登録</h2>
        </div>
        <div style="width: 350px;"></div>
    </div>
    
    <div style=" display: flex; justify-content: space-between; margin-top: 10px; margin-bottom: 100px;">
        <div style="width: 350px;"></div>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
            @csrf
            @method('PUT')
            <div style="display: flex;">
                <div style="padding: 15px;">
                    <div>
                        <img src="{{ asset('storage/images/'. $product->image) }}" alt="画像" style="width: 320px; height: 205px; object-fit: cover;">
                    </div>
                    <div>
                        <input type="file" name="image">
                    </div>
                </div>
                <div style="width: 300px; padding: 15px;">
                    <div style="margin-bottom: 5px;">
                        <label>商品名</label>
                    </div>
                    <div style=" margin-bottom: 20px;">
                        <input type="text" name="name"  style="width: 95%;" value="{{ old('name', $product->name ?? '') }}">
                        @error('name')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom: 5px;">
                        <label>値段</label>
                    </div>
                    <div style="width: auto;">
                        <input type="text" name="price" style="width: 95%;" value="{{ old('price', $product->price ?? '') }}">
                        @error('price')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-top: 20px;">
                        <label>季節</label>
                    </div>
                    <div>
                        <input type="checkbox" name="season[]" value="spring" {{ in_array('spring', old('season', $product->season ?? [])) ? 'checked' : '' }}>
                        <label for="spring">春</label>

                        <input type="checkbox" name="season[]" value="summer" {{ in_array('summer', old('season', $product->season ?? [])) ? 'checked' : '' }}>
                        <label for="summer">夏</label>

                        <input type="checkbox" name="season[]" value="autumn" {{ in_array('autumn', old('season', $product->season ?? [])) ? 'checked' : '' }}>
                        <label for="autumn">秋</label>

                        <input type="checkbox" name="season[]" value="winter" {{ in_array('winter', old('season', $product->season ?? [])) ? 'checked' : '' }}>
                        <label for="winter">冬</label>
                        @error('season')
                            <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 20px; margin-bottom: 5px;">
                <label style="padding: 5px;">商品説明</label>
            </div>
            <div style="padding: 10px;">
                <textarea name="content" cols="40" rows="10" style="width: 100%; height: 200px;" id="content">{{ old('content') ?? $product->content }}</textarea>
                @error('content')
                    <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div style="display: flex; justify-content: center; align-items: center; margin-top: 10px; margin-bottom: 20px;">
                <div style=" margin: 10px; width: 100px; text-align: center; ">
                    <button style="width: 100px; height: 30px; border-radius: 8px;" type="button" onclick="window.location.href='{{ route('products') }}'">戻る</button>
                </div>
                <div>
                    <button style="width: 100px; height: 30px; background-color: orange; border-radius: 8px;">変更を保存</button>
                </div>
            </div>
        </form>
        <div style="width: 350px;"></div>
    </div>
@endsection
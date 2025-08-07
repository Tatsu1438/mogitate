<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:10',
            'price' => 'required|integer|min:0|max:10000',
            'image' => 'required|image|mimes:jpeg,png',
            'season' => 'required|array',
            'season.*'=>'in:spring,summer,autumn,winter',
            'content' => 'required|string|max:120',
        ];
    }
    public function messages() {
        return [
            'name.required' => '商品名を入れてください',
            'price.required' => '値段を入れてください',
            'price.integer'=>'数値で入力してください',
            'price.max'=>'0から10000円以内で記入してください',
            'image.required' => '商品画像をアップロードしてください',
            'image.mimes' => '「.png」または「.jpeg」で入力してください',
            'season.required' => '季節を選択してください',
            'content.required' => '商品説明を記述してください',
            'content.max' => '120文字以内で入力してください',
        ];
    }
}

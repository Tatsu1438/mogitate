<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png',
            'season' => 'required|array',
            'season.*'=>'in:spring,summer,autumn,winter',
            'content' => 'required|string|max:120',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '商品名を入れてください',
            'price.required' => '値段を入れてください',
            'price.max'=>'0から10000円以内で記入してください',
            'image.image' => '画像ファイルを選んでください',
            'image.mimes' => '「.png」または「.jpeg」で入力してください',
            'season.required' => '季節を選択してください',
            'content.required' => '商品説明を記述してください',
            'content.max' => '120文字以内で記入してください',
        ];
    }
}

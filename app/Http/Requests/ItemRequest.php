<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'name' => ['required', 'string'],
            'code' => ['required', 'string', Rule::unique('items')->ignore($this->id)],
            'price' => ['required', 'integer', 'min:0'],
            'amount' => ['integer', 'min:0'],
        ];
    }
    /**
     * string ⽂字列
     * integer 整数
     * min:数値 最⼩値
     * unique 重複
    */
    // Rule::unique('items')->ignore($this->id)
    // データチェックでcodeが重複した際、idが⾃分なら無視する処理

    public function messages()
    {
    //     return [
    //         'name.required' => Lang::get('messages.name_required'),
    //         'code.required' => Lang::get('messages.code_required'),
    //         'code.required' => Lang::get('messages.code_unique'),
    //         'price.required' => Lang::get('messages.price_required'),
    //         'price.integer' => Lang::get('messages.price_invalid'),
    //         'price.min' => Lang::get('messages.price_invalid'),
    //         'amount.integer' => Lang::get('messages.amount_invalid'),
    //         'amount.min' => Lang::get('messages.amount_invalid'),
    //     ];
        return [
            "amount.integer" => Lang::get("messages.amount_invalid"),
            "price.integer" => Lang::get("messages.price_invalid"),
            "code.unique" => Lang::get("messages.code_unique"),
        ];
    }
}

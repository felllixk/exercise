<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->id
        ]);
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'        =>  ['required', 'integer', 'exists:orders'],
            'phone'     =>  ['required', 'string', 'size:11'],
            'fullname'  =>  ['required', 'string', 'max:50'],
            'sum'       =>  ['required', 'integer', 'min:100'],
            'address'   =>  ['required', 'string'],
        ];
    }
}

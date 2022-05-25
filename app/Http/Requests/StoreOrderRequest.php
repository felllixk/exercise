<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone'     => ['required', 'string', 'size:11'],
            'fullname'  => ['required', 'string', 'max:50'],
            'sum'       => ['required', 'integer', 'min:100'],
            'address'   => ['required', 'string'],
        ];
    }

    public function store()
    {
        return Order::create($this->validated());
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("web")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'numeric',
            'user_id' => 'numeric',
            'title' => 'string|nullable',
            'sum' => 'numeric',
            'full_name' => 'string|nullable',
            'status' => 'numeric',
            'send_to' => 'string',
        ];
    }

    protected function prepareForValidation()
    {
        //
    }
}

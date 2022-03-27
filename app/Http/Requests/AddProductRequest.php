<?php

/**
 * This request type is for validating and authorizing get addresses request
 *
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->user()->is_owner;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price'=>  [ 'numeric', 'required' ],
            'is_tax_included'=> [ 'boolean', 'required' ],
            'shipping_cost'=> [ 'numeric', 'nullable' ],
            'tax_percentage'=> [ 'numeric', 'nullable' ],
            'en_name'=>  [ 'string', 'required' ],
            'ar_name'=> [ 'string', 'required' ],
        ];
    }
}

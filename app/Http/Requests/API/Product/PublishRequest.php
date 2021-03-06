<?php

namespace App\Http\Requests\API\Product;

use App\Models\Product;
use InfyOm\Generator\Request\APIRequest;

class PublishRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->can('publish-product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Product::publishRules();
    }
}

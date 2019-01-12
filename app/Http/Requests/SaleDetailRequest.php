<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleDetailRequest extends FormRequest
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

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'product_id' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'product_id' => 'required',
                ];
            }
            default:
                break;
        }
    }
}

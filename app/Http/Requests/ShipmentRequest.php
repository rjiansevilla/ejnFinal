<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentRequest extends FormRequest
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
            'van_no'    => 'required',
            'bl_no'     => 'required|numeric',
            'ship_from' => 'required',
            'ship_to'   => 'required',
            'price'     => 'required',
            'ship_date' => 'required',
            'bales'     => 'numeric',
            'kls'       => 'numeric',
            'others'    => 'numeric',
        ];
    }

    /**
     * Message to rules
     * 
     * @return array
     */
    public function message()
    { 

    }
}
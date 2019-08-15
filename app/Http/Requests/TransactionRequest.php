<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            // "quality" => 'required',
            // "sacks" => 'required|numeric',
            // "station_id" => 'required',
            // "gross_weight" => 'required|numeric',
            // "net_weight" => 'required|numeric',
            // "moisture" => 'required|numeric',
            // "unit_price" => 'required|numeric',
            // "ntc" => 'numeric',
            // "others" => 'numeric'
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
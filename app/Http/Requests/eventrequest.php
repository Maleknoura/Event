<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'description' => 'required|string|max:455',
            'date' => 'required',
            'place_available' => 'required',
            'mode'=>'required',
            'categorie_id'=> 'required',
        ];
    }
}

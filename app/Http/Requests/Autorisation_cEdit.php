<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Autorisation_cEdit extends FormRequest
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
                'id'=>'required',
                'numero' => 'required',
                'date_signature' => 'required',
                'date_expiration' => 'required',
                'localisation_geo' => 'required',
                'surface' => 'required',
                'commune' => 'required',
                'quantite' => 'required',
                'produit_id' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InformationValidation
 *
 * @package App\Http\Requests\Account
 */
class InformationValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:120',
            'lastname' => 'required|string|max:120',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
        ];
    }
}

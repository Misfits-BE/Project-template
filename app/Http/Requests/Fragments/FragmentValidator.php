<?php

namespace App\Http\Requests\Fragments;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FrgamentValidator
 * 
 * @package App\Http\Requests\Fragments
 */
class FragmentValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required|max:190', 
            'content' => 'string|required'
        ];
    }
}

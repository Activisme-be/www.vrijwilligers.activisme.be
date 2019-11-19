<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TeamFormRequest
 *
 * @package App\Http\Requests
 */
class TeamFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:teams'],
            'verantwoordelijke' => ['required', 'integer'],
        ];
    }
}

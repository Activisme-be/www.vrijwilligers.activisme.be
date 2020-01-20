<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class VolunteerFormRequest
 *
 * @package App\Http\Requests
 */
class VolunteerFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'birth_date' => ['required', 'date', 'date_format:d-m-Y'],
            'email' => ['required', 'string', 'email', 'unique:volunteers'],
        ];
    }
}

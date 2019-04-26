<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'position' => 'required|in:'. implode(',', array_keys(config('master.positions'))),
            'birthday' => 'required|date|date_format:Y-m-d',
            'password' => 'string|nullable|between:6,18|confirmed',
            'roles'    => 'required|array'
        ];
    }
}

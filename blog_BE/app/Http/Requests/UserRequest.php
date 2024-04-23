<?php

namespace App\Http\Requests;

use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $name = '';
        if (request()->routeIs('auth.register')) {
            $name = 'required|string';
        } elseif (request()->routeIs('auth.login')) {
            $name = 'sometimes|string';
        }


        $c_password = '';
        if (request()->routeIs('auth.register')) {
            $c_password = 'required|same:password';
        } elseif (request()->routeIs('auth.login')) {
            $c_password = 'sometimes|same:password';
        }

        return [
            'name' => $name,
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'c_password' => $c_password,
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->name == null) {
            $this->request->remove('name');
        }
    }
}

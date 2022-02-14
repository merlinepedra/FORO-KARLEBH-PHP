<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        'city' => 'nullable|string|max:100',
        'country' => 'nullable|string|max:50',
        'phone' => 'nullable|max:100',
        'sex' => 'nullable|string|max:10',
        'images' => 'nullable'
      ];
    }
  }

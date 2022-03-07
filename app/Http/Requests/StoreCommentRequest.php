<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
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
        // 'comment' => [Rule::requiredIf(empty(request()->images)), 'min:3'],
        'comment' => 'required|min:3',
        'post_id' => 'int',
        'parent_id' => 'int',
        'images' => 'nullable'
      ];
    }
  }

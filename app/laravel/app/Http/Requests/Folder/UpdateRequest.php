<?php

namespace App\Http\Requests\Folder;

use App\Models\Folder;
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
        return $this->user()->ownsFolder(
            Folder::findOrFail($this->route('folder_id'))
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|string"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.'
        ];
    }
}

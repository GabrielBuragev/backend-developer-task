<?php

namespace App\Http\Requests\Note;

use App\Models\Folder;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'is_public' => 'integer',
            'noteable_type' => 'required|in:' . implode(",", array_keys(config('note_content_morph_map'))),
        ];
        return $rules;
    }


    public function messages()
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'is_public' => 'The is_public field must be integer.',
            'noteable_type.in' => 'Attribute noteable_type should be one of [' . implode(",", array_keys(config('note_content_morph_map'))) . '].'
        ];
        return $messages;
    }
}

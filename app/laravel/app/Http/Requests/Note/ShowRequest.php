<?php

namespace App\Http\Requests\Note;

use App\Models\Folder;
use App\Models\Note;
use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Folder::findOrFail($this->route('folder_id'))->notes()->findOrFail(
            $this->route('note_id')
        )->hasReadAccessUser($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}

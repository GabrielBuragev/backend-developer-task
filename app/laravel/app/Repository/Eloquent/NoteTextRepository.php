<?php

namespace App\Repository\Eloquent;

use App\Models\NoteText;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class NoteTextRepository extends NoteContentRepository
{
    protected $model;

    public function __construct(NoteText $model)
    {
        $this->model = $model;
    }


    public function validations()
    {
        return [
            'noteable' => "required|array",
            'noteable.content' => 'required|string|min:0'
        ];
    }
    public function validationMessages()
    {
        return [
            'noteable.content' => 'Content parameter should be string.'
        ];
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        Validator::make($payload, $this->validations(), $this->validationMessages())->validate();

        $model = $this->model->create([
            'content' => $payload['noteable']['content']
        ]);

        return $model->fresh();
    }

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $modelId, array $payload): bool
    {
        Validator::make($payload, $this->validations(), $this->validationMessages())->validate();

        $model = $this->findById($modelId);

        return $model->update([
            'content' => $payload['noteable']['content']
        ]);
    }
}

<?php

namespace App\Repository\Eloquent;

use App\Models\NoteList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class NoteListRepository extends NoteContentRepository
{
    protected $model;

    public function __construct(NoteList $model)
    {
        $this->model = $model;
    }

    public function validations()
    {
        return [
            'noteable' => 'present|array',
            'noteable.items' => 'present|array',
            'noteable.items.*.content' => 'required|string|min:0'
        ];
    }

    public function validationMessages()
    {
        return [];
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create($payload): ?Model
    {
        Validator::make($payload, $this->validations(), $this->validationMessages())->validate();

        $items = $payload['noteable']['items'];

        $model = $this->model->create();

        foreach ($items as $item) {
            $model->items()->create([
                'content' => $item['content'],
            ]);
        }
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
        $items = $payload['noteable']['items'];
        // Remove list items that are not in the current json payload matching by id
        if (count($items)) {
            $ids = array_map(function ($i) {
                return isset($i['id']) ? $i['id'] : null;
            }, $items);
            $model->items()->whereNotIn('id', $ids)->delete();
        }
        // Create or update list items from payload
        foreach ($items as $item) {
            if (isset($item['id']))
                $model->items()->updateOrCreate(
                    ['id' => $item['id']],
                    ['content' => $item['content']]
                );
            else
                $model->items()->create(['content' => $item['content']]);
        }

        return 1;
    }
}

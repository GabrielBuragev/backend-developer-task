<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteText extends Model
{
    protected $fillable = ['content'];

    public function scopeFilterByText($query, string $text)
    {
        return $query->where('content', 'like', "%" . $text . "%");
    }

    public function note()
    {
        return $this->morphOne(Note::class, 'noteable');
    }
}

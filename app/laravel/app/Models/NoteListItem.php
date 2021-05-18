<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteListItem extends Model
{
    protected $fillable = ['content', 'note_list_id'];

    public function note_list()
    {
        return $this->belongsTo(NoteList::class);
    }
}

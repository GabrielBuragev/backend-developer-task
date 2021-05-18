<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteList extends Model
{
    public function note()
    {
        return $this->morphOne(Note::class, 'noteable')->with('items');
    }


    public function items()
    {
        return $this->hasMany(NoteListItem::class);
    }
}

<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name', 'is_public', 'folder_id', 'noteable_id', 'noteable_type'];
    protected $hidden = ['noteable_id', 'folder_id'];

    public function noteable()
    {
        return $this->morphTo()->morphWith([
            NoteList::class => "items"
        ]);
    }

    public function scopeFilterByText($query, string $text)
    {
        return $query->whereHasMorph(
            'noteable',
            ["App\Models\NoteList", "App\Models\NoteText"],
            function ($q, $type) use ($text) {
                if ($type == 'App\Models\NoteText')
                    $q->where('content', 'like', '%' . $text . '%');
                if ($type == 'App\Models\NoteList')
                    $q->whereHas('items', function ($q2) use ($text) {
                        $q2->where('content', 'like', '%' . $text . '%');
                    });
            }
        );
    }

    public function scopeShared($query, $value)
    {
        return $query->where('is_public', '=', $value);
    }


    public function scopeSortBy($query, $by)
    {
        switch ($by) {
            case "shared_last":
                return $query->orderBy('is_public', 'asc');
            case "shared_first":
                return $query->orderBy('is_public', 'desc');
            case "name_asc":
                return $query->orderBy('name', 'asc');
            case "name_desc":
                return $query->orderBy('name', 'desc');
            default:
                return $query;
        }
    }

    public function whereFolderId($id)
    {
        return $this->folder()->whereId($id);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function hasWriteAccessUser(User $user)
    {
        return $this->folder->user->id == $user->id;
    }

    public function hasReadAccessUser(User $user)
    {
        if ($this->is_public || $this->folder->user->id == $user->id)
            return true;
        else false;
    }
}

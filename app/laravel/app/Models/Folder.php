<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Folder extends Model
{
    //
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}

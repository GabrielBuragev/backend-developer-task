<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Folder;
use App\Models\TextNote;
use App\Models\Note;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }
    public function notes()
    {
        return $this->hasManyThrough(Note::class, Folder::class);
    }

    public function ownsFolder(Folder $folder)
    {
        if ($folder->user->id == $this->id)
            return true;
        else false;
    }
}

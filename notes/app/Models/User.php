<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class User extends Model
{
    protected $table = 'public.users';

    public function notes() {
        return $this->hasMany(Note::class);
    }
}

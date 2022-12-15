<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function history()
    {
        return $this->hasMany(History::class);
        // todo: convert task deadline to carbon instance
    }

    public function asignee()
    {
        return $this->belongsTo(User::class);
    }
}

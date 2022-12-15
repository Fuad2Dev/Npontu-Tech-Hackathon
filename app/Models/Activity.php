<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function assignees()
    {
        return $this->belongsToMany(User::class, 'tasks');
    }

}

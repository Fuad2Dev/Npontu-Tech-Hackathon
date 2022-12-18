<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $dates = ['deadline'];

    protected $fillable = ['name', 'description', 'user_id', 'deadline', 'activity_id'];

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'status',
        'note',
        'assigned_to'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

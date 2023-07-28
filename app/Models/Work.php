<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $table = 'Works';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function breaktimes()
    {
        return $this->hasmany(Breaktime::class);
    }
}

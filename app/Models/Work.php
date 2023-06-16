<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('app\Models\User');
    }
    public function breaktime()
    {
        return $this->hasmany('app\Models\Breaktime');
    }
}

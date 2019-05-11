<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['name', 'work_at', 'from', 'until', 'detail', 'thumbnail'];
}

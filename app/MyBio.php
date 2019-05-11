<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyBio extends Model
{
    protected $table = 'mybio';

    protected $fillable = ['description', 'photo_background', 'name', 'ig', 'in', 'fb', 'twitter', 'github'];
}

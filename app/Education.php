<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $table = 'educations';
	
    protected $fillable = ['study', 'university', 'from', 'until', 'description', 'thumbnail'];
}

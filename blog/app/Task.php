<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Custom function
    public function scopeisCompleted($query) {
    	return $query->where('id', '>', 1);
    } 
}

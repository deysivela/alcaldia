<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['level_employee'];

    public function charges()
    {
    	return $this->hasMany(Charge::class);
    }

    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }
}

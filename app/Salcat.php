<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salcat extends Model
{
    protected $fillable = ['category'];

    public function salaries()
    {
    	return $this->hasMany(Salarie::class);
    }
}

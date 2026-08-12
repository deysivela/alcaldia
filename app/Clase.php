<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = ['clase'];

    public function salaries()
    {
    	return $this->hasMany(Salarie::class);
    }
}

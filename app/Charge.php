<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = ['level_id','charge_employee'];

    public function levels()
    {
    	return $this->belongsTo(Level::class,'level_id');
    }

    public function Employees()
    {
    	return $this->hasMany(Employee::class);
    }
}

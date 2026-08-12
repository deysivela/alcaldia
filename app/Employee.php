<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['level_id','charge_id','type_employee','name','last_name','sex','address','phone','email','photo'];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function levels()
    {
    	return $this->belongsTo(Level::class,'level_id');
    }

    public function charges()
    {
    	return $this->belongsTo(Charge::class,'charge_id');
    }

    public function salaries()
    {
    	return $this->belongsTo(Salarie::class,'salarie_id');
    }
}

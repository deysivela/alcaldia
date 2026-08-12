<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salarie extends Model
{
    protected $fillable = ['salcat_id','clase_id','level_salary','denomination','nro_item','salary_monthly','salary_total'];

    public function salcats()
    {
    	return $this->belongsTo(Salcat::class,'salcat_id');
    }

    public function clases()
    {
    	return $this->belongsTo(Clase::class,'clase_id');
    }
}

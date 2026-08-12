<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newpage extends Model
{
    protected $fillable = ['user_id','titulo','contenido','photo','fecha'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
	protected $fillable=['tipo'];
	
      public function documents()
    {
    	return $this->hasMany(Document::class);
    }
}

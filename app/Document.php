<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	protected $fillable = ['user_id','categorie','cod','entity','description','date_creation','file','name_document','data_document','statu','publish'];

        public function users()
    {
    	return $this->belongsTo(User::class);
    }

    	public function categories()
    	{
    		return $this->belongsTo(Categorie::class,'categorie_id');
    	}
}

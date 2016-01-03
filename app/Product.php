<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public $incrementing = false;

	protected $fillable = array('id', 'name', 'slug', 'description', 'unitPrice', 'quantity', 'created_at', 'updated_at', 'deleted_at');


	public function description()
	{
		return nl2br($this->description);
	}

}

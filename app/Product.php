<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public $incrementing = false;

	public function description()
	{
		return nl2br($this->description);
	}

}

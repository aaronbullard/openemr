<?php namespace OEMR\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel{

	public $timestamps = FALSE;
}
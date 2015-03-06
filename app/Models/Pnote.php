<?php namespace OEMR\Models;



class Pnote extends Model {

	public $dates = ['date'];

	protected $fillable = ['title', 'body', 'assigned_to'];

}

<?php namespace Aaronbullard\Restful\Interfaces;

interface MetaInterface {
	public function addMeta($key, $value);
	public function setMeta(array $meta);
	public function getMeta();
}
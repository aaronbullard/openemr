<?php namespace Aaronbullard\Restful\Interfaces;

interface ErrorsInterface {
	public function setErrors($message, array $errors = []);
	public function getErrors();
}
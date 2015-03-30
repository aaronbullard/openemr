<?php namespace Aaronbullard\Restful;

abstract class Responder {
	abstract public function respond(array $data = [], $http_code = 200, array $headers = []);
}
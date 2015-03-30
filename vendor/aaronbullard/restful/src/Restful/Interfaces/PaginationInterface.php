<?php namespace Aaronbullard\Restful\Interfaces;

use Illuminate\Pagination\Paginator;

interface PaginationInterface {
	public function setPagination(Paginator $paginator);
	public function getPagination();
}
<?php namespace Aaronbullard\Transformers;

use Illuminate\Support\Collection;

abstract class Transformer {
	
	public function transformArray(array $items)
	{
		return array_map([$this, 'transformObject'], $items);
	}
	
	abstract public function transformObject($item);
	
	public function transformCollection(Collection $items)
	{
		return $items->map(function($item){
			return $this->transformObject($item);
		});
	}
	
	public function transform( $items )
	{
		// Is it a collection object?
		if( $items instanceOf Collection )
		{
			return $this->transformCollection( $items );
		}
		// Is this an array of objects?
		if( is_array($items) && ! is_array($items[0]) )
		{
			return array_map([$this, 'transformObject'], $items);
		}
		return $this->transformObject( $items );
	}
}

<?php namespace Aaronbullard\Nesting\Middleware;

use Closure;
use Aaronbullard\Exceptions\NotFoundException;
use Illuminate\Database\DatabaseManager;
use Aaronbullard\Nesting\Services\RequestTranslator;

abstract class CheckIfNested {

	protected static $childKey = 'id';

	protected $db;

	protected $translator;

	public function __construct(DatabaseManager $db)
	{
		$this->db = $db;
		$this->translator = new RequestTranslator(static::$parentUri, static::$childUri);
	}

	protected function getTable()
	{
		return static::$table;
	}

	protected function getForeignKeyForParent()
	{
		return static::$parentKey;
	}

	protected function getPrimaryKeyForChild()
	{
		return static::$childKey;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Check if nested route
		if( ! $this->translator->isNestedResourceRoute($request) )
		{
			return $next($request);
		}

		$exists = $this->db->table($this->getTable())
			->where($this->getForeignKeyForParent(), $this->translator->getParentId($request))
			->where($this->getPrimaryKeyForChild(), $this->translator->getChildId($request))
			->exists();

		if( ! $exists )
		{
			throw new NotFoundException("Nested resource was not found.");
		}

		return $next($request);
	}

}

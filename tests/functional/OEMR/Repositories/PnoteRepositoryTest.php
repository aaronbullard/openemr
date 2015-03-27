<?php namespace OEMR\Repositories;


class PnoteRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \FunctionalTester
	 */
	protected $tester;

	protected $_repo;

	protected function _before()
	{
		$this->_repo = $this->tester->grabService('OEMR\\Repositories\\PnoteRepository');
	}

}
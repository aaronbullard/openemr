<?php namespace Aaronbullard\Exceptions;

require_once __DIR__ . '/../../../stubs/NotFoundChildException.php';
use Aaronbullard\Exceptions\Stubs\NotFoundChildException;

class NotFoundExceptionTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected function _before()
	{
	}

	protected function _after()
	{
	}

	// tests
	public function testGettingHttpCodeAsConstant()
	{
		$code = NotFoundException::HTTP_CODE;
		$this->assertEquals(404, $code);
	}

	// tests
	public function testGettingHttpCodeAsMethod()
	{
		$e = new NotFoundException;
		$this->assertEquals(404, $e->getHttpCode());
	}

	public function testGettingHttpCodeConstantFromChild()
	{
		$code = NotFoundChildException::HTTP_CODE;
		$this->assertEquals(404, $code);
	}

	public function testGettingHttpCodeFromChild()
	{
		$e = new NotFoundChildException;
		$this->assertEquals(404, $e->getHttpCode());
	}

	public function testOverridingDescription()
	{
		$desc = NotFoundChildException::DESCRIPTION;
		$this->assertEquals("Test description", $desc);
	}

}
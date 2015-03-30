<?php namespace OEMR\Transformers;

use DateTime;
use Mockery;

class BaseTransformerTest extends \Codeception\TestCase\Test
{
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected $_transformer;

	protected function _before()
	{
		$this->_transformer = new BaseTransformer;
	}

	protected function _after()
	{
		Mockery::close();
	}

	// tests
	public function testItCallsToArray()
	{
		$obj = Mockery::mock('OEMR\\Models\\Patient');
		$obj->shouldReceive('toArray')->once()->andReturn([]);

		$this->_transformer->transform( $obj );
	}

	public function testItCastsFieldsToIntegersByReference()
	{
		$obj = [
			'id' => '1',
			'name' => 'MyName',
			'amount' => '10'
		];

		$this->assertFalse( is_integer($obj['id']));
		$this->assertFalse( is_integer($obj['amount']));

		BaseTransformer::castToIntegers($obj, ['id', 'amount']);

		$this->assertTrue( is_integer($obj['id']));
		$this->assertTrue( is_integer($obj['amount']));
	}

	public function testItCastsToUnixTimestamp()
	{
		$obj = [
			'id' => '1',
			'name' => 'MyName',
			'date' => '2015-01-01 12:00:00',
			'dateObj' => new DateTime('2015-01-01 12:00:00')
		];


		$this->assertFalse( is_integer($obj['date']));
		$this->assertInstanceOf('DateTime', $obj['dateObj']);

		BaseTransformer::castToUnixTimestamps($obj, ['date', 'dateObj']);

		$this->assertTrue( is_integer($obj['date']));
		$this->assertNotInstanceOf('DateTime', $obj['dateObj']);

		$date = date('Y-m-d H:i:s', $obj['date']);
		$this->assertEquals('2015-01-01 12:00:00', $date);
	}

}
<?php namespace Aaronbullard\Restful;

class ResponderTest extends \TestCase {

	protected $responder;

	protected $response;

	public function setUp()
	{
		parent::setUp();

		$this->responder = $this->app->make('Aaronbullard\\Restful\\Responder');
		$this->facade = $this->app->make('Aaronbullard\\Restful\\ResponderFacade');

		$data = ['user' => 1];

		$this->response = $this->convertResponseObjectToArray( $this->responder->respond($data) );
	}
//*
	public function testIoCReturnsAnInstanceOfResponder()
	{
		$responder = $this->app->make('Aaronbullard\\Restful\\ResponseInterface');

		$this->assertInstanceOf('Aaronbullard\\Restful\\ResponseInterface', $responder, "IoC doesn't return and instance of Aaronbullard\Restful\Responder.");
	}

	public function testResponderHasStatus()
	{
		$this->assertEquals('success', $this->response['status']);
	}

	public function testResponderExposesSetStatusMethod()
	{
		$response = $this->convertResponseObjectToArray( $this->responder->setStatus('error')->respond() );

		$this->assertEquals('error', $response['status']);
	}

	public function testResponderHasHttpCode()
	{
		$this->assertEquals(200, $this->response['http']);
	}

	public function testResponderCanSetHttpCode()
	{
		$response = $this->convertResponseObjectToArray( $this->responder->setHttpCode(400)->respond() );

		$this->assertEquals(400, $response['http']);
	}

	public function testResponderHasRedirect()
	{
		$this->assertEquals(NULL, $this->response['redirect']);
	}

	public function testResponderCanSetRedirect()
	{
		$url = "http://www.google.com";

		$response = $this->convertResponseObjectToArray( $this->responder->setRedirection($url)->respond() );

		$this->assertEquals($url, $response['redirect']);
	}

	public function testResponderHasMeta()
	{
		$this->assertEquals([], $this->response['meta']);
	}

	public function testResponderCanSetMeta()
	{
		$meta = ['page' => 4];

		$response = $this->convertResponseObjectToArray( $this->responder->setMeta($meta)->respond() );

		$this->assertEquals($meta, $response['meta']);

		// Can set a key value
		$response = $this->convertResponseObjectToArray($this->responder->addMeta('key', 'value')->respond() );

		$this->assertEquals('value', $response['meta']['key']);
	}

	public function testResponderCanSetErrors()
	{
		$message = "Validation errors!";
		$errors = [
			'username' => 'Username is required',
			'password' => 'Password is required'
		];

		// Convert the response object an array
		$response = $this->convertResponseObjectToArray( $this->responder->setErrors($message, $errors)->respond() );

		$this->assertTrue( array_key_exists('errors', $response));

		$this->assertEquals($response['errors'], [
			'message' => $message,
			'errors' => $errors
		]);
	}

	public function testResponderHasDataField()
	{
		$this->assertEquals(['user' => 1], $this->response['data']);
	}

	public function testResponserFacade()
	{
		$response = $this->convertResponseObjectToArray( $this->facade->respondOK() );
		$this->assertEquals($response, [
			'http' 	=> 200,
			'status' => 'success',
			'data' => [],
			'meta' => [],
			'redirect' => null
		]);

		$payload = ['user' => 1];
		$response = $this->convertResponseObjectToArray( $this->facade->respondOK( $payload ) );
		$this->assertEquals($response, [
			'http' 	=> 200,
			'status' => 'success',
			'data' => $payload,
			'meta' => [],
			'redirect' => null
		]);

		$response = $this->convertResponseObjectToArray( $this->facade->respondCreated() );
		$this->assertEquals($response, [
			'http' 	=> 201,
			'status' => 'success',
			'data' => [],
			'meta' => [],
			'redirect' => null
		]);

		$response = $this->convertResponseObjectToArray( $this->facade->respondBadRequest() );
		$this->assertEquals($response, [
			'http' 	=> 400,
			'status' => 'error',
			'errors' => [
				'message' => 'Bad Request!',
				'errors' => []
			],
			'data' => [],
			'meta' => [],
			'redirect' => null
		]);

		$message = "Validation errors!";
		$errors = [
			'username' => 'Username is required',
			'password' => 'Password is required'
		];
		$response = $this->convertResponseObjectToArray( $this->facade->respondFormValidation($message, $errors) );
		$this->assertEquals($response, [
			'http' 	=> 422,
			'status' => 'error',
			'errors' => [
				'message' => "Validation errors!",
				'errors' => $errors
			],
			'data' => [],
			'meta' => [],
			'redirect' => null
		]);
	}

	public function testResponseTrait()
	{
		# code...
	}
//*/
	protected function convertResponseObjectToArray($object)
	{
		return json_decode( json_encode( $object->getData()), true);
	}

}
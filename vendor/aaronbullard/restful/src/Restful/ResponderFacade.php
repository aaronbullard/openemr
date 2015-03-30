<?php namespace Aaronbullard\Restful;

use Aaronbullard\Restful\Interfaces\MetaInterface;

class ResponderFacade implements ResponseInterface, MetaInterface {

	protected $responder;

	public function __construct(Responder $responder)
	{
		$this->responder = $responder;
	}
	
	public function addMeta($key, $value)
	{
		$this->responder->addMeta($key, $value);
		
		return $this;
	}
	
	public function setMeta(array $meta)
	{
		$this->responder->setMeta($meta);
		
		return $this;
	}
	
	public function getMeta()
	{
		return $this->responder->getMeta();
	}

	protected function respondSuccess($data)
	{
		$this->responder->setStatus('success');
		$this->responder->setData($data);
	}

	protected function respondError($message, array $errors = [])
	{
		$this->responder->setStatus('error');
		$this->responder->setErrors($message, $errors);
	}


	public function respondOK($data = [])
	{
		$this->respondSuccess($data);

		$this->responder->setHttpCode(200);

		return $this->responder->respond();
	}


	public function respondCreated($data = [])
	{
		$this->respondSuccess($data);

		$this->responder->setHttpCode(201);

		return $this->responder->respond();
	}


	public function respondBadRequest($message = 'Bad Request!')
	{
		$this->respondError($message);

		$this->responder->setHttpCode(400);

		return $this->responder->respond();
	}


	public function respondUnauthorized($message = 'Unauthorized Request!')
	{
		$this->respondError($message);

		$this->responder->setHttpCode(401);
		
		return $this->responder->respond();
	}


	public function respondForbidden($message = 'Forbidden!')
	{
		$this->respondError($message);

		$this->responder->setHttpCode(403);
		
		return $this->responder->respond();
	}


	public function respondNotFound($message = 'Not Found!')
	{
		$this->respondError($message);

		$this->responder->setHttpCode(404);
		
		return $this->responder->respond();
	}

	public function respondMethodNotAllowed($message = 'Method Not Allowed!')
	{
		$this->respondError($message);

		$this->responder->setHttpCode(405);
		
		return $this->responder->respond();
	}

	public function respondConflict($message = 'Conflict!')
	{
		$this->respondError($message);

		$this->responder->setHttpCode(409);
		
		return $this->responder->respond();
	}


	public function respondFormValidation($message = 'Unprocessable Entity!', array $errors = [])
	{
		$this->respondError($message, $errors);

		$this->responder->setHttpCode(422);
		
		return $this->responder->respond();
	}


	public function respondInternalError($message = 'Internal Error!')
	{
		$this->respondError($message);

		$this->responder->setHttpCode(500);
		
		return $this->responder->respond();
	}

}

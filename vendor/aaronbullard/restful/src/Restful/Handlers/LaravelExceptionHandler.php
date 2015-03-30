<?php namespace Aaronbullard\Restful\Handlers;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Aaronbullard\Restful\ResponseTrait;
use Aaronbullard\Exceptions\CoreException;
use Aaronbullard\Exceptions\HttpException;
use Aaronbullard\Exceptions\BadRequestException;
use Aaronbullard\Exceptions\ForbiddenException;
use Aaronbullard\Exceptions\InternaServerErrorException;
use Aaronbullard\Exceptions\MethodNotAllowedException;
use Aaronbullard\Exceptions\UnprocessableEntityException;
use Aaronbullard\Exceptions\NotFoundException;
use Aaronbullard\Exceptions\UnauthorizedException;

class LaravelExceptionHandler extends ExceptionHandler {

	use ResponseTrait;

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		if ( $this->isCoreException($e))
		{
			return $this->renderCoreException($e);
		}

		if ($this->isHttpException($e))
		{
			return $this->renderHttpException($e);
		}

		return parent::render($request, $e);
	}

	protected function isCoreException($e)
	{
		return is_subclass_of($e, 'Aaronbullard\\Exceptions\\CoreException');
	}

	protected function renderCoreException(CoreException $e)
	{
		try{
			throw $e;
		}
		catch(BadRequestException $e)
		{
			return $this->getResponder()->respondBadRequest($e->getMessage());
		}
		catch(NotFoundException $e)
		{
			return $this->getResponder()->respondNotFound($e->getMessage());
		}
		catch(ForbiddenException $e)
		{
			return $this->getResponder()->respondForbidden($e->getMessage());
		}
		catch(UnauthorizedException $e)
		{
			return $this->getResponder()->respondUnauthorized($e->getMessage());
		}
		catch(MethodNotAllowedException $e)
		{
			return $this->getResponder()->respondMethodNotAllowed($e->getMessage());
		}
		catch(UnprocessableEntityException $e)
		{
			$errors = $e->getErrors();
			$errors = is_null($errors) ? [] : $errors;
			return $this->getResponder()->respondFormValidation($e->getMessage(), $errors);
		}
		catch(InternaServerErrorException $e)
		{
			return $this->getResponder()->respondInternalError($e->getMessage());
		}
		catch(HttpException $e)
		{
			return $this->getResponder()->respondInternalError($e->getMessage());
		}
		catch(CoreException $e)
		{
			return $this->getResponder()->respondInternalError($e->getMessage());
		}
	}

}

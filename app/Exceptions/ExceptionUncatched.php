<?php

namespace App\Exceptions;

use App\Http\Resources\JsonResponse;

/**
 * 
 */
class ExceptionUncatched
{
	protected $message = null;
	
	protected $code = 0;

	public function __construct($message = null, $code = Response::HTTP_INTERNAL_SERVER_ERROR)
	{
		$this->code = $code;
		$this->message = $message ?: 'Server Exception';
	}

	public function render()
	{
		$json = [
			'code' => $this->code,
			'message' => [$this->message],
			'data' => null
		];

		return new JsonResponse($json);
	}
}
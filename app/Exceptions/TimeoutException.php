<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

/**
 * 		
 */
class TimeoutException extends AbstractException
{
	
	public function __construct($message = '', $code = null)
	{
		if(!$message) {
			$message = __('exception.timeout');
		}

		if (!$code) {
            $code = Response::HTTP_REQUEST_TIMEOUT;
        }
        parent::__construct($message, $code);
	}
}
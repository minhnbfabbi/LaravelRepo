<?php 

namespace App\Traits;

trait HandleErrorApi {

	public function respondErr($msg = 'Unauthorized', $code = 401) 
	{
		return response()->json(['error' => $msg], $code);
	}
	
}
<?php 

namespace App\Traits;

trait HandleCheckAuthorization
{
	public function isAdmin($user) 
	{
		return $user->is_admin === 1;
	}
}
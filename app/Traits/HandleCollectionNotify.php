<?php 

namespace App\Traits;

trait HandleCollectionNotify
{
	public function getCollectionNotify($notify = [], $title = '') 
	{
		return [
			'title' => $title,
			'body' => $notify
		];
	}
}
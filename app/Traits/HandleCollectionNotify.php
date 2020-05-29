<?php 

namespace App\Traits;

trait HandleCollectionNotify
{
	public function getCollectionNotify($notify = [], $title = '') 
	{
		return [
			'data' => [
				'title' => $title,
				'body' => $notify
			]
		];
	}
}
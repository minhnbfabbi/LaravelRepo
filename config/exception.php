<?php

return [
	'items' => [
		[
			'class' => \App\Exceptions\TimeoutException::class,
			'code' => '',
			'message' => ''
		],
		// catched
		

		// uncatched
		\Symfony\Component\ErrorHandler\Error\FatalError::class,
	],
];
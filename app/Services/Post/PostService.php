<?php

namespace App\Services\Post;

use App\Models\PostElasticsearch;
use App\EngineSearches\Elasticsearch\Rules\SearchTitleRule;
/**
 *
 */
class PostService
{

	public function __construct()
	{
		# code...
	}

	public function get()
	{
		$query = 'title'; // <-- Change the query for testing.

    	$posts = PostElasticsearch::search($query)->rule(SearchTitleRule::class)->count();

		return $posts;
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use App\EngineSearches\Elasticsearch\Rules\SearchTitleRule;
use App\EngineSearches\Elasticsearch\Config\PostIndexConfigurator;

class PostElasticsearch extends Model
{
    use Searchable;

    protected $table = 'posts';
    /**
     * @var string
     */
    protected $indexConfigurator = PostIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        SearchTitleRule::class
    ];

    /**
     * @var array
     */

    // Here you can specify a mapping for model fields
    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
                // Also you can configure multi-fields, more details you can find here https://www.elastic.co/guide/en/elasticsearch/reference/current/multi-fields.html
                'fields' => [
                    'raw' => [
                        'type' => 'keyword',
                    ]
                ]
            ],
        ]
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'posts_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
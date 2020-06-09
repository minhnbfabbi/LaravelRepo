<?php

namespace App\EngineSearches\Elasticsearch\Rules;

use ScoutElastic\SearchRule;

class SearchTitleRule extends SearchRule
{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {
        return [
            'fields' => [
                'title' => [
                    'type' => 'plain'
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {
        return [
            'must' => [
                'match' => [
                    'title' => $this->builder->query
                ]
            ]
        ];
    }
}
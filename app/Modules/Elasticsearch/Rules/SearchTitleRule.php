<?php

namespace App\Modules\Elasticsearch\Rules;

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
        dd($this->builder->query);
        return [
            'must' => [
                'match' => [
                    'title' => $this->builder->query
                ]
            ]
        ];
    }
}
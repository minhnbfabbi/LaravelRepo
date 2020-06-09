<?php

namespace App\EngineSearches\Elasticsearch\Config;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class PostIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name = 'posts_index'; 
    /**
     * @var array
     */
    protected $settings = [
        //
    ];
}
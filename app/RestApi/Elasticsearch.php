<?php
/**
 * Elasticsearch.php :
 *
 * PHP version 7.1
 *
 * @category Elasticsearch
 * @package  App\RestApi
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi;

use Elasticsearch\ClientBuilder as ESClientBuilder;


class Elasticsearch
{
    /**
     * @var ESClientBuilder
     */
    public $elasticsearch;

    /**
     * Elasticsearch constructor.
     */
    public function __construct()
    {
        $this->elasticsearch = app('elasticsearch');
    }
}

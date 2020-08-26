<?php
/**
 * HttpElasticsearch.php :
 *
 * PHP version 7.1
 *
 * @category HttpElasticsearch
 * @package  App\RestApi
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi;


use GuzzleHttp\Client;

class HttpElasticsearch
{
    /**
     * @var Client
     */
    public $client;

    /**
     * @var string 地址
     */
    public $host;

    /**
     * Elasticsearch constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->host = "http://localhost:9400";
    }
}

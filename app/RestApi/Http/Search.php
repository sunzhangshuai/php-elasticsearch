<?php
/**
 * Search.php :
 *
 * PHP version 7.1
 *
 * @category Search
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\SearchInterface;

/**
 * Search : 搜索
 *
 * @category Search
 * @author   zhangshuai <zhangshuai1134@gmail.com>
 */
class Search extends HttpElasticsearch implements SearchInterface
{
    /**
     * @inheritDoc
     */
    public function search()
    {
        $uri = $this->host . '/_search';
        return json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function indexSearch($index)
    {
        $uri = $this->host . '/' . $index . '/_search';
        return json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function indicesSearch($indices)
    {
        $uri = $this->host . '/' . implode(',', $indices) . '/_search';
        return json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function indexPatternSearch($indices)
    {
        $uri = $this->host . '/' . $indices . '/_search';
        return json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }
}

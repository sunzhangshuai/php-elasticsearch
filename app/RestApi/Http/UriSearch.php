<?php
/**
 * UriSearch.php :
 *
 * PHP version 7.1
 *
 * @category UriSearch
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\UriSearchInterface;

class UriSearch extends HttpElasticsearch implements UriSearchInterface
{

    /**
     * @inheritDoc
     */
    public function search($query, $df, $sort, $from, $size, $timeout, $profile)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q'       => $query,
                'df'      => $df,
                'sort'    => $sort,
                'from'    => $from,
                'size'    => $size,
                'timeout' => $timeout
            ],
            'json'  => [
                'profile' => 'true'
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function genericsSearch($value)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => $value
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function fieldSearch($field, $value)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => $field . ':' . $value
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function phraseSearch($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '"' . implode(' ', $array) . '"',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function groupSearch($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '(' . implode(' ', $array) . ')',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function andSearch($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '(' . implode(' AND ', $array) . ')',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function orSearch($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '(' . implode(' OR ', $array) . ')',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function notSearch($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '(' . implode(' NOT ', $array) . ')',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function symbolSearch($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '(' . implode(' %2B', $array) . ')',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function rangeSearch($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '[' . implode(' TO', $array) . ']',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function patternSearch($string)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => $string . '*',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function fuzzySearch($string)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => $string . '~1',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function approximationQuery($array)
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'query' => [
                'q' => '"' . implode(' ', $array) . '"' . '~1',
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }
}

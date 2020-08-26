<?php
/**
 * Index.php :
 *
 * PHP version 7.1
 *
 * @category Index
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\IndexInterface;

/**
 * Index : 索引类
 *
 * @category Index
 * @author   zhangshuai <zhangshuai1134@gmail.com>
 */
class Index extends HttpElasticsearch implements IndexInterface
{
    /**
     * @inheritDoc
     */
    public function create($index, $param)
    {
        $uri = $this->host . '/' . $index;
        $param = [
            'form_param' => $param
        ];
        return \GuzzleHttp\json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function indices($title = false, $columns = [], $index_matching = '')
    {
        $uri = $this->host . '/_cat/indices';
        if ($index_matching) {
            $uri .= '/' . $index_matching;
        }
        $query = [];
        if ($title) {
            $query['v'] = '';
        }
        if ($columns) {
            $query['h'] = implode(',', $columns);
        }
        $param = [
            'query' => $query
        ];
        return $this->client->get($uri, $param)->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function greenIndices()
    {
        $uri = $this->host . '/_cat/indices';
        $param = [
            'healthy' => 'green'
        ];
        return $this->client->get($uri, $param)->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function sortIndicesByDocuments()
    {
        $uri = $this->host . '/_cat/indices';
        $param = [
            'query' => [
                's' => 'docs.count:desc'
            ]
        ];
        return $this->client->get($uri, $param)->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function memoryForIndices()
    {
        $uri = $this->host . '/_cat/indices';
        $param = [
            'query' => [
                'v' => '',
                'h' => 'i,tm',
                's' => 'tm:desc'
            ]
        ];
        return $this->client->get($uri, $param)->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function indexInfo($index)
    {
        $uri = $this->host . '/' . $index;
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function documentCount($index)
    {
        $uri = $this->host . '/' . $index . '/_count' ;
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function catDocumentFormat($index)
    {
        $uri = $this->host . '/' . $index . '/_search' ;
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function delete($index)
    {
        $uri = $this->host . '/' . $index;
        return \GuzzleHttp\json_decode($this->client->delete($uri)->getBody()->getContents(), true);
    }
}

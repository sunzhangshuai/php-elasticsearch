<?php
/**
 * Document.php :
 *
 * PHP version 7.1
 *
 * @category Document
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\DocumentInterface;

class Document extends HttpElasticsearch implements DocumentInterface
{

    /**
     * @inheritDoc
     */
    public function create($index, $document)
    {
        $uri   = $this->host . '/' . $index . '/_doc';
        $param = [
            'json' => $document
        ];
        return \GuzzleHttp\json_decode($this->client->post($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function createById($index, $id, $document)
    {
        $uri   = $this->host . '/' . $index . '/_doc/' . $id;
        $param = [
            'query' => [
                'op_type' => 'create'
            ],
            'json'  => $document
        ];
        return \GuzzleHttp\json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function createById2($index, $id, $document)
    {
        $uri   = $this->host . '/' . $index . '/_create/' . $id;
        $param = [
            'json' => $document
        ];
        return \GuzzleHttp\json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function find($index, $id)
    {
        $uri = $this->host . '/' . $index . '/_doc/' . $id;
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function index($index, $id, $document)
    {
        $uri   = $this->host . '/' . $index . '/_doc/' . $id;
        $param = [
            'json' => $document
        ];
        return \GuzzleHttp\json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function update($index, $id, $document)
    {
        $uri   = $this->host . '/' . $index . '/_update/' . $id;
        $param = [
            'json' => [
                'doc' => $document
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->post($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function delete($index, $id)
    {
        $uri = $this->host . '/' . $index . '/_doc/' . $id;
        return \GuzzleHttp\json_decode($this->client->delete($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function bulk()
    {
        // TODO: Implement bulk() method.
    }

    /**
     * @inheritDoc
     */
    public function mget($param)
    {
        // TODO: Implement mget() method.
    }

    /**
     * @inheritDoc
     */
    public function mgetByIndex($index, $param)
    {
        // TODO: Implement mgetByIndex() method.
    }

    /**
     * @inheritDoc
     */
    public function msearch($index, $param)
    {
        // TODO: Implement msearch() method.
    }
}

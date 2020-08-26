<?php
/**
 * Cluster.php :
 *
 * PHP version 7.1
 *
 * @category Cluster
 * @package  App\RestApi
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\ClusterInterface;

class Cluster extends HttpElasticsearch implements ClusterInterface
{
    /**
     * @inheritDoc
     */
    public function nodes()
    {
        $uri = $this->host . '/_cat/nodes';
        return $this->client->get($uri)->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function nodesTable()
    {
        $uri   = $this->host . '/_cat/nodes';
        $param = [
            'query' => ['v' => '']
        ];
        return $this->client->get($uri, $param)->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function searchNode($node_names)
    {
        $uri = $this->host . '/_nodes/' . implode(',', $node_names);
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function searchColumn($columns)
    {
        $uri   = $this->host . '/_cat/nodes/';
        $param = [
            'query' => [
                'v' => '',
                'h' => implode(',', $columns)
            ]
        ];
        return $this->client->get($uri, $param)->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function health()
    {
        $uri = $this->host . '/_cluster/health';
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function shardsHealth()
    {
        $uri   = $this->host . '/_cluster/health';
        $param = [
            'query' => [
                'level' => 'shards'
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function indicesHealth($indices)
    {
        $uri = $this->host . '/_cluster/health/' . implode(',', $indices);
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function indicesShardsHealth($indices)
    {
        $uri   = $this->host . '/_cluster/health/' . implode(',', $indices);
        $param = [
            'query' => [
                'level' => 'shards'
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function cluster()
    {
        $uri = $this->host . '/_cluster/state';
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function clusterSettings()
    {
        $uri = $this->host . '/_cluster/settings';
        return \GuzzleHttp\json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function clusterSettingsDefault()
    {
        $uri   = $this->host . '/_cluster/settings';
        $param = [
            'query' => [
                'include_defaults' => "true"
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function shards($title, $columns = [])
    {
        $uri   = $this->host . '/_cat/shards';
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
}

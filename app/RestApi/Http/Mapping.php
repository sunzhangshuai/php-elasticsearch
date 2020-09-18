<?php
/**
 * Mapping.php :
 *
 * PHP version 7.1
 *
 * @category Mapping
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;

use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\MappingInterface;

class Mapping extends HttpElasticsearch implements MappingInterface
{

    /**
     * @inheritDoc
     */
    public function search($index)
    {
        $uri = $this->host . '/' . $index . '/_mapping';
        return json_decode($this->client->get($uri)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function setIndexFalse($index)
    {
        $uri = $this->host . '/' . $index;
        $param = [
            'json' => [
                'mappings' => [
                    'properties' => [
                        "name" => [
                            "type" => "keyword",
                            "index" => false
                        ],
                        "age" => [
                            "type" => "integer",
                            "index" => false
                        ]
                    ]
                ]
            ]
        ];
        return json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function setNullValue($index)
    {
        $uri = $this->host . '/' . $index;
        $param = [
            'json' => [
                'mappings' => [
                    'properties' => [
                        "name" => [
                            "type" => "keyword",
                            "null_value" => 'NULL'
                        ],
                        "age" => [
                            "type" => "integer",
                            "null_value" => 'NULL'
                        ]
                    ]
                ]
            ]
        ];
        return json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function setCopyTo($index)
    {
        $uri = $this->host . '/' . $index;
        $param = [
            'json' => [
                'mappings' => [
                    'properties' => [
                        "first_name" => [
                            "type" => "keyword",
                            "copy_to" => "fullName"
                        ],
                        "age" => [
                            "type" => "integer",
                            "copy_to" => "fullName"
                        ]
                    ]
                ]
            ]
        ];
        return json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function setDynamic($index, $dynamic)
    {
        $uri = $this->host . '/' . $index;
        $param = [
            'json' => [
                'mappings' => [
                    "dynamic" => $dynamic// 未定义的字段：true：建立索引，false：不建立索引：strict：插入失败
                ]
            ]
        ];
        return json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }
}

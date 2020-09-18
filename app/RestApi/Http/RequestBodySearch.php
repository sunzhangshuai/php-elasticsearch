<?php
/**
 * RequestBody.php :
 *
 * PHP version 7.1
 *
 * @category RequestBody
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\RequestBodySearchInterface;

class RequestBodySearch extends HttpElasticsearch implements RequestBodySearchInterface
{

    /**
     * @inheritDoc
     */
    public function search($query, $df, $sort, $from, $size, $timeout, $profile)
    {

    }

    /**
     * @inheritDoc
     */
    public function source($index, $source)
    {
        $uri   = $this->host . '/' . $index . '/_search';
        $param = [
            'json' => [
                '_source' => $source
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function scriptField($index)
    {
        $uri   = $this->host . '/' . $index . '/_search';
        $param = [
            'json' => [
                'script_fields' => [
                    'new_field' => [
                        'script' => [
                            'lang'   => 'painless',
                            'source' => "doc['year'].value+'hello'"
                        ]
                    ]
                ]
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function match()
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'json' => [
                'query' => [
                    'match' => [
                        'title' => 'Triumph'
                    ]
                ]
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function matchOperate()
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'json' => [
                'query' => [
                    'match' => [
                        'title' => [
                            "query"    => 'Triumph Spirit',
                            "operator" => "and"
                        ]
                    ]
                ]
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function matchPhrase()
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'json' => [
                'query' => [
                    'match_phrase' => [
                        'title' => 'Triumph Spirit'
                    ]
                ]
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function matchPhraseSlop()
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'json' => [
                'query' => [
                    'match_phrase' => [
                        'title' => 'Triumph Spirit',
                        "slop"  => 2
                    ]
                ]
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function queryString()
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'json' => [
                'query' => [
                    'query_string' => [
                        'query'         => 'Triumph and Spirit',
                        "default_field" => "title"
                    ]
                ]
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function simpleQueryString()
    {
        $uri   = $this->host . '/movies/_search';
        $param = [
            'json' => [
                'query' => [
                    'simple_query_string' => [
                        'query'            => 'Triumph Spirit',
                        "fields"           => ["title"],
                        'default_operator' => 'and'
                    ]
                ]
            ]
        ];
        return json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }
}

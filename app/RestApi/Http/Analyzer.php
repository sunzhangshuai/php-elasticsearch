<?php
/**
 * Analyzer.php :
 *
 * PHP version 7.1
 *
 * @category Analyzer
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\AnalyzerInterface;

/**
 * Analyzer : 分词器
 *
 * @category Analyzer
 * @author   zhangshuai <zhangshuai1134@gmail.com>
 */
class Analyzer extends HttpElasticsearch implements AnalyzerInterface
{
    /**
     * @inheritDoc
     */
    public function testByAnalyzer($analyzer, $text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => $analyzer,
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function testByField($index, $field, $text)
    {
        $uri   = $this->host . '/' . $index . '/_analyze';
        $param = [
            'json' => [
                "field" => $field,
                "text"  => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function testByCustom(array $char_filter, string $tokenizer, array $filter, string $text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "char_filter" => $char_filter,
                "tokenizer"   => $tokenizer,
                'filter'      => $filter,
                "text"        => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function standardAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'standard',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function simpleAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'simple',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function whitespaceAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'whitespace',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function stopAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'stop',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function keywordAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'keyword',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function patternAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'pattern',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function englishAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'english',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function ICUAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'icu',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function IKAnalyzer($text)
    {
        $uri   = $this->host . '/_analyze';
        $param = [
            'json' => [
                "analyzer" => 'ik',
                "text"     => $text
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $param)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function mappingDefinitionAnalyzer()
    {
        $uri   = $this->host . '/test_index';
        $param = [
            'json' => [
                'settings' => [
                    "analysis" => [
                        "analyzer" => [
                            "zhangsan_analyzer" => [
                                "type" => "custom",
                                "char_filter" => ["zhangsan_filter"],
                                "tokenizer" => "zhangsan_token",
                                "filter" => ["lowercase", "english_stop", "mask_stop"]
                            ]
                        ],
                        "tokenizer" => [
                            "zhangsan_token" => [
                                "type" => "pattern",
                                "pattern" => "[ .,!?]"
                            ],
                        ],
                        "char_filter" => [
                            "zhangsan_filter" => [
                                "type" => "mapping",
                                "mappings" => [
                                    ":) => _happy_",
                                    "laopo => sunchen"
                                ],
                            ]
                        ],
                        "filter" => [
                            "english_stop" => [
                                "type" => "stop",
                                "stopwords" => '_english_'
                            ],
                            "mask_stop" => [
                                "type" => "stop",
                                "stopwords" => ['fuck', '草泥马']
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->put($uri, $param)->getBody()->getContents(), true);
    }
}

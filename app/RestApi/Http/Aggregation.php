<?php
/**
 * Aggregation.php :
 *
 * PHP version 7.1
 *
 * @category Aggregation
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\AggregationInterface;

class Aggregation extends HttpElasticsearch implements AggregationInterface
{

    /**
     * @inheritDoc
     */
    public function buckets()
    {
        $uri = $this->host . '/movies/_search';
        $params = [
            'json' => [
                'size' => 0,
                'aggs' => [
                    'year_bucket' => [
                        "terms" => [
                            "field" => "year"
                        ]
                    ]
                ]
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $params)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function bucketsAndStats()
    {
        $uri = $this->host . '/movies/_search';
        $params = [
            'json' => [
                'size' => 0,
                'aggs' => [
                    'year_bucket' => [
                        "terms" => [
                            "field" => "year"
                        ],
                        "aggs" => [
                            "title_stats" => [
                                "stats" => [
                                    "field" => "year"
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $params)->getBody()->getContents(), true);
    }

    /**
     * @inheritDoc
     */
    public function pipelineBuckets()
    {
        $uri = $this->host . '/kibana_sample_data_flights/_search';
        $params = [
            'json' => [
                'size' => 0,
                'aggs' => [
                    'DestCountry' => [
                        "terms" => [
                            "field" => "DestCountry"
                        ],
                        "aggs" => [
                            "OriginWeather" => [
                                "terms" => [
                                    "field" => "OriginWeather"
                                ]
                            ],
                            "AvgTicketPrice" => [
                                "terms" => [
                                    "field" => "AvgTicketPrice"
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return \GuzzleHttp\json_decode($this->client->get($uri, $params)->getBody()->getContents(), true);
    }
}

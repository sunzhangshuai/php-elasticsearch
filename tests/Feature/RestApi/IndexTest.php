<?php

namespace Tests\Feature\RestApi;

use App\RestApi\Http\Index;
use GuzzleHttp\Exception\GuzzleException;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @throws GuzzleException
     */
    public function testIndex()
    {
        $index_server = new Index();
        $index        = 'kibana*';
        $title        = true;
        $columns      = [
            'health', // 健康状态
            'status', // 是否开启
            'index',  // 索引名
            'uuid',   // 索引的唯一id
            'pri',
            'rep',
            'docs.count', // 文档数量
        ];
        $index_server->indices($title, $columns, $index);
        $index_server->greenIndices();
        $index_server->sortIndicesByDocuments();
        $index_server->memoryForIndices();
        $index = 'movies';
        $index_server->indexInfo($index);
        $index_server->documentCount($index);
        $index_server->catDocumentFormat($index);

        $index = 'test_laopo';
        $param = [
            'settings' => [
                'number_of_shards'   => 2,
                'number_of_replicas' => 1
            ]
        ];
        $index_server->create($index, $param);
        $index_server->delete($index);

        $this->assertTrue(true);
    }
}

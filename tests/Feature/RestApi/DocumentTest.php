<?php

namespace Tests\Feature\RestApi;

use App\RestApi\Http\Document;
use App\RestApi\Http\Index;
use GuzzleHttp\Exception\GuzzleException;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @throws GuzzleException
     */
    public function testDocument()
    {
        $index_server = new Index();
        $index = 'laopo';
        $param = [
            'settings' => [
                'number_of_shards' => 2,
                'number_of_replicas' => 2
            ],
            'mappings' => [
                'properties' => [
                    'name' => [
                        'type' => 'keyword',
                    ],
                    'age' => [
                        'type' => 'integer'
                    ],
                    'sex' => [
                        'type' => 'integer',
                    ],
                    'birthday' => [
                        'type' => 'date',
                        'format' => 'yyyy-MM-dd'
                    ]
                ]
            ]
        ];
//        $index_server->create($index, $param);
        $document_server = new Document();
        $document = [
            'name' => 'sunchen',
            'age' => 52
        ];
        $document_server->create($index, $document);

        $id1 = uniqid() . '_id1';
        $document_server->createById($index, $id1, $document);
        $id2 = uniqid() . '_id2';
        $document_server->createById2($index, $id2, $document);

        $document = [
            'name' => 'sunchen',
            'sex' => 1
        ];
        $document_server->index($index, $id1, $document);
        $document_server->update($index, $id2, $document);
        $document_server->delete($index, $id1);



//        $index_server->delete($index);
        $this->assertTrue(true);

        dd($document);
    }
}

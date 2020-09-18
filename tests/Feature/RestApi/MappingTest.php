<?php

namespace Tests\Feature\RestApi;

use App\RestApi\Http\Mapping;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MappingTest extends TestCase
{
    public $mapping;

    public function setUp(): void
    {
        $this->mapping = new Mapping();
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @group mapping
     *
     * @return void
     */
    public function testExample()
    {
        $result = $this->mapping->search('movies');

        $result = $this->mapping->setIndexFalse('test3');

        dd($result);
    }
}
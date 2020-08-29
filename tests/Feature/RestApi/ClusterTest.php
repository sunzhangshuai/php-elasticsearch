<?php

namespace Tests\Feature\RestApi;

use App\RestApi\Http\Cluster;
use GuzzleHttp\Exception\GuzzleException;
use Tests\TestCase;

class ClusterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @throws GuzzleException
     */
    public function testCluster()
    {
        $cluster = new Cluster();
        $cluster->nodes();
        $cluster->nodesTable();
        $nodes = ['slave01', 'slave02'];
        $cluster->searchNode($nodes);
        $columns = [
            'id',// 每个节点都有一个唯一的id
            'name',
            'ip',// ip
            'port',// 端口
            'v',// 版本号
            'm'// 是否为主服务
        ];
        $cluster->searchColumn($columns);
        $cluster->health();
        $cluster->shardsHealth();
        $indices = ['movies', 'laopo'];
        $cluster->indicesHealth($indices);
        $cluster->cluster();
        $cluster->clusterSettings();
        $cluster->clusterSettingsDefault();
        $columns = [
            'index', // 索引
            'shard', // 分片号
            'prirep',// 读写
            'state',// 状态
            'unassigned.reason'
        ];
        $cluster->shards(true, $columns);

        $this->assertTrue(true);
    }
}

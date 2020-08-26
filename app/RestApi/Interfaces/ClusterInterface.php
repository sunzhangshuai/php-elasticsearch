<?php
/**
 * ClusterInterface.php :
 *
 * PHP version 7.1
 *
 * @category ClusterInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;

use GuzzleHttp\Exception\GuzzleException;

/**
 * 集群接口
 *
 * Interface ClusterInterface
 *
 * @package App\RestApi\Interfaces
 */
interface ClusterInterface
{
    /**
     * 获取所有节点，不含表头
     *
     * @return string
     * @throws GuzzleException
     */
    public function nodes();

    /**
     * 获取所有节点，含表头
     *
     * @return array
     * @throws GuzzleException
     */
    public function nodesTable();

    /**
     * 通过节点名称获取节点详情
     *
     * @param array $node_names
     *
     * @return array
     * @throws GuzzleException
     */
    public function searchNode($node_names);

    /**
     * 指定列获取所有节点信息
     *
     * @param $columns
     *
     * @return array
     * @throws GuzzleException
     */
    public function searchColumn($columns);

    /**
     * 集群健康检测
     *
     * @return array
     * @throws GuzzleException
     */
    public function health();

    /**
     * 分片级别健康检测
     *
     * @return array
     * @throws GuzzleException
     */
    public function shardsHealth();

    /**
     * 指定索引健康检测
     *
     * @param array $indices
     *
     * @return array
     * @throws GuzzleException
     */
    public function indicesHealth($indices);

    /**
     * 指定索引的分片级别健康检测
     *
     * @param array $indices
     *
     * @return array
     * @throws GuzzleException
     */
    public function indicesShardsHealth($indices);

    /**
     * 集群的详细信息
     *
     * @return array
     * @throws GuzzleException
     */
    public function cluster();

    /**
     * 获取集群的设置
     *
     * @return array
     * @throws GuzzleException
     */
    public function clusterSettings();

    /**
     * 获取集群的设置，包含默认设置
     *
     * @return array
     * @throws GuzzleException
     */
    public function clusterSettingsDefault();

    /**
     * 获取分片信息，可指定是否获取表头，和要获取的列
     *
     * @param bool  $title
     * @param array $columns
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function shards($title, $columns);
}

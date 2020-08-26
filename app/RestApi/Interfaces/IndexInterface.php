<?php
/**
 * IndexInterface.php :
 *
 * PHP version 7.1
 *
 * @category IndexInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;

use GuzzleHttp\Exception\GuzzleException;

/**
 * 索引接口
 *
 * Interface IndexInterface
 *
 * @package App\RestApi\Interfaces
 */
interface IndexInterface
{
    /**
     * 创建索引
     *
     * @param string $index
     * @param array  $param
     *
     * @return array
     * @throws GuzzleException
     */
    public function create($index, $param);

    /**
     * 查看索引列表
     *
     * @param bool   $title
     * @param array  $columns
     * @param string $index_matching 支持正则
     *
     * @return string
     * @throws GuzzleException
     */
    public function indices($title, $columns, $index_matching);

    /**
     * 查看状态为绿的索引
     *
     * @return array
     * @throws GuzzleException
     */
    public function greenIndices();

    /**
     * 按照文档个数排序
     *
     * @return array
     * @throws GuzzleException
     */
    public function sortIndicesByDocuments();

    /**
     * 查看每个索引使用的内存数
     *
     * @return array
     * @throws GuzzleException
     */
    public function memoryForIndices();

    /**
     * 查看索引的相关信息
     *
     * @param $index
     *
     * @return array
     * @throws GuzzleException
     */
    public function indexInfo($index);

    /**
     * 查看索引的文档总数
     *
     * @param $index
     *
     * @return array
     * @throws GuzzleException
     */
    public function documentCount($index);

    /**
     * 通过获取前10条文档来查看文档格式
     *
     * @param $index
     *
     * @return array
     * @throws GuzzleException
     */
    public function catDocumentFormat($index);

    /**
     * 删除索引
     *
     * @param $index
     *
     * @return array
     * @throws GuzzleException
     */
    public function delete($index);
}

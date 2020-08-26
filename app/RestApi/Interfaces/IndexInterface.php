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
     * 查看索引列表
     *
     * @return array
     */
    public function indices();

    /**
     * 查看状态为绿的索引
     *
     * @return array
     */
    public function greenIndices();

    /**
     * 按照文档个数排序
     *
     * @return array
     */
    public function sortIndicesByDocuments();

    /**
     * 查看索引具体字段
     *
     * @return array
     */
    public function searchIndices();

    /**
     * 查看每个索引使用的内存数
     *
     * @return array
     */
    public function memoryForIndices();

    /**
     * 查看索引的相关信息
     *
     * @param $index
     *
     * @return array
     */
    public function indexInfo($index);

    /**
     * 查看索引的文档总数
     *
     * @param $index
     *
     * @return array
     */
    public function documentCount($index);

    /**
     * 通过获取前10条文档来查看文档格式
     *
     * @param $index
     *
     * @return array
     */
    public function catDocumentFormat($index);

    /**
     * 删除索引
     *
     * @param $index
     *
     * @return array
     */
    public function delete($index);
}

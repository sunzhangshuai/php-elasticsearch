<?php
/**
 * SearchInterface.php :
 *
 * PHP version 7.1
 *
 * @category SearchInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;

/**
 * 简单查询
 *
 * Interface SearchInterface
 *
 * @package App\RestApi\Interfaces
 */
interface SearchInterface
{
    /**
     * 集群上的所有索引查询文档
     *
     * @return array
     */
    public function search();

    /**
     * 指定索引查询文档
     *
     * @param $index
     *
     * @return array
     */
    public function indexSearch($index);

    /**
     * 指定多个索引查询文档
     *
     * @param $indices
     *
     * @return array
     */
    public function indicesSearch($indices);

    /**
     * 索引通配符方式查询
     *
     * @param $indices
     *
     * @return array
     */
    public function indexPatternSearch($indices);
}

<?php
/**
 * Aggregation.php :
 *
 * PHP version 7.1
 *
 * @category Aggregation
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;


interface Aggregation
{
    /**
     * 按照目的地进行分桶统计
     *
     * @return array
     */
    public function buckets();

    /**
     * 按照目的地进行分桶统计、并增加统计信息
     *
     * @return array
     */
    public function bucketsAndStats();

    /**
     * 按照目的地统计天气信息和价格
     *
     * @return array
     */
    public function pipelineBuckets();
}

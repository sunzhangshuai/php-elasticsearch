<?php
/**
 * MappingInterface.php :
 *
 * PHP version 7.1
 *
 * @category MappingInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;


interface MappingInterface
{
    public function search($index);

    /**
     * 设置字段不被索引
     *
     * @param $index
     *
     * @return array
     */
    public function setIndexFalse($index);

    /**
     * 设置空值查询
     *
     * @param $index
     *
     * @return array
     */
    public function setNullValue($index);

    /**
     * 设置copy to
     *
     * @param $index
     *
     * @return array
     */
    public function setCopyTo($index);

    /**
     * 设置dynamic
     *
     * @param $index
     * @param $dynamic
     *
     * @return array
     */
    public function setDynamic($index, $dynamic);
}

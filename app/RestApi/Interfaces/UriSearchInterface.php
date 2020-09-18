<?php
/**
 * UriSearchInterface.php :
 *
 * PHP version 7.1
 *
 * @category UriSearchInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;


interface UriSearchInterface
{
    /**
     * 普通查询
     *
     * @param string $query   查询内容
     * @param string $df      查询字段
     * @param string $sort    排序方法
     * @param int    $from
     * @param int    $size    分页
     * @param int    $timeout 超时时间
     * @param bool   $profile 是否查看查询过程
     *
     * @return array
     */
    public function search($query, $df, $sort, $from, $size, $timeout, $profile);

    /**
     * 范查询
     *
     * @param $query
     *
     * @return array
     */
    public function genericsSearch($value);

    /**
     * 指定字段查询
     *
     * @param $field
     * @param $value
     *
     * @return array
     */
    public function fieldSearch($field, $value);

    /**
     * 短语查询，且，并且前后顺序一致
     *
     * @param $array
     *
     * @return array
     */
    public function phraseSearch($array);

    /**
     * 分组查询
     *
     * @param $array
     *
     * @return array
     */
    public function groupSearch($array);

    /**
     * 且查询
     *
     * @param $array
     *
     * @return array
     */
    public function andSearch($array);

    /**
     * 或查询
     *
     * @param $array
     *
     * @return array
     */
    public function orSearch($array);

    /**
     * 非查询
     *
     * @param $array
     *
     * @return array
     */
    public function notSearch($array);

    /**
     * 带符号的查询
     *
     * @param $array
     *
     * @return array
     */
    public function symbolSearch($array);

    /**
     * 范围查询
     *
     * @param $array
     *
     * @return array
     */
    public function rangeSearch($array);

    /**
     * 通配符查询
     *
     * @param $string
     *
     * @return array
     */
    public function patternSearch($string);

    /**
     * 模糊查询
     *
     * @param $string
     *
     * @return array
     */
    public function fuzzySearch($string);

    /**
     * 近似度查询
     *
     * @param $array
     *
     * @return array
     */
    public function approximationQuery($array);
}

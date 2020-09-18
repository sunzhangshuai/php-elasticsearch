<?php
/**
 * RequestBodySearch.php :
 *
 * PHP version 7.1
 *
 * @category RequestBodySearch
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;


interface RequestBodySearchInterface
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
     * 通过source查询
     *
     * @param $index
     * @param $source
     *
     * @return array
     */
    public function source($index, $source);

    /**
     * 脚本查询
     *
     * @return array
     */
    public function scriptField($index);

    /**
     * 匹配查询
     *
     * @return array
     */
    public function match();

    /**
     * 匹配查询指定关联方式
     *
     * @return array
     */
    public function matchOperate();

    /**
     * 短语匹配
     *
     * @return array
     */
    public function matchPhrase();

    /**
     * 短语匹配模糊匹配
     *
     * @return array
     */
    public function matchPhraseSlop();

    /**
     * 字符串查询
     *
     * @return array
     */
    public function queryString();

    /**
     * 简单字符串查询
     *
     * @return array
     */
    public function simpleQueryString();
}

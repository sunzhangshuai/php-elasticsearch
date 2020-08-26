<?php
/**
 * DocumentInterface.php :
 *
 * PHP version 7.1
 *
 * @category DocumentInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;

use GuzzleHttp\Exception\GuzzleException;

/**
 * 文档的操作接口
 *
 * Interface DocumentInterface
 *
 * @package App\RestApi\Interfaces
 */
interface DocumentInterface
{
    /**
     * 创建不指定id的文档
     *
     * @param string $index
     * @param array  $document
     *
     * @return array
     * @throws GuzzleException
     */
    public function create($index, $document);

    /**
     * 创建指定id的文档
     *
     * @param string $index
     * @param int    $id
     * @param array  $document
     *
     * @return array
     * @throws GuzzleException
     */
    public function createById($index, $id, $document);

    /**
     * 创建指定id的文档，第二种写法
     *
     * @param string $index
     * @param int    $id
     * @param array  $document
     *
     * @return array
     * @throws GuzzleException
     */
    public function createById2($index, $id, $document);

    /**
     * 指定id获取文档
     *
     * @param string $index
     * @param int    $id
     *
     * @return array
     * @throws GuzzleException
     */
    public function find($index, $id);

    /**
     * 对原文档先删除，再写入（覆盖操作）
     *
     * @param string $index
     * @param int    $id
     * @param array  $document
     *
     * @return array
     * @throws GuzzleException
     */
    public function index($index, $id, $document);

    /**
     * 在原文档的基础上修改，可增加字段
     *
     * @param string $index
     * @param int    $id
     * @param array  $document
     *
     * @return array
     * @throws GuzzleException
     */
    public function update($index, $id, $document);

    /**
     * 删除文档
     *
     * @param string $index
     * @param int    $id
     *
     * @return array
     * @throws GuzzleException
     */
    public function delete($index, $id);

    /**
     * 多条指令批量操作
     *
     * @return array
     * @throws GuzzleException
     */
    public function bulk();

    /**
     * 批量获取
     *
     * @param array $param
     *
     * @return array
     * @throws GuzzleException
     */
    public function mget($param);

    /**
     * 指定索引批量获取
     *
     * @param string $index
     * @param array  $param
     *
     * @return array
     * @throws GuzzleException
     */
    public function mgetByIndex($index, $param);

    /**
     * 指定索引批量查询
     *
     * @param string $index
     * @param array  $param
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function msearch($index, $param);
}

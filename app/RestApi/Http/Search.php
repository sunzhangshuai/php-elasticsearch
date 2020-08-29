<?php
/**
 * Search.php :
 *
 * PHP version 7.1
 *
 * @category Search
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\SearchInterface;

/**
 * Search : 搜索
 *
 * @category Search
 * @author   zhangshuai <zhangshuai1134@gmail.com>
 */
class Search extends HttpElasticsearch implements SearchInterface
{

}

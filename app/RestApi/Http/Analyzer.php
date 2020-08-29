<?php
/**
 * Analyzer.php :
 *
 * PHP version 7.1
 *
 * @category Analyzer
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\AnalyzerInterface;

/**
 * Analyzer : 分词器
 *
 * @category Analyzer
 * @author   zhangshuai <zhangshuai1134@gmail.com>
 */
class Analyzer extends HttpElasticsearch implements AnalyzerInterface
{

}

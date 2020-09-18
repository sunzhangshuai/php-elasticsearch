<?php
/**
 * AnalyzerInterface.php :
 *
 * PHP version 7.1
 *
 * @category AnalyzerInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;

/**
 * 分词器
 *
 * Interface AnalyzerInterface
 *
 * @package App\RestApi\Interfaces
 */
interface AnalyzerInterface
{
    /**
     * 直接指定分词器进行分词测试
     *
     * @param string $analyzer
     * @param string $text
     *
     * @return array
     */
    public function testByAnalyzer($analyzer, $text);

    /**
     * 直接指定索引的字段进行分词测试
     *
     * @param string $index
     * @param string $field
     * @param string $text
     *
     * @return array
     */
    public function testByField($index, $field, $text);

    /**
     * 自定义索引字段进行测试
     *
     * @param array  $char_filter
     * @param string $tokenizer 分词规则
     * @param array  $filter    分开的词语加工规则
     * @param string $text
     *
     * @return array
     */
    public function testByCustom(array $char_filter, string $tokenizer, array $filter, string $text);

    /**
     * 标准分词器
     *
     * @param $text
     *
     * @return array
     */
    public function standardAnalyzer($text);

    /**
     * 简单分词器
     *
     * @param $text
     *
     * @return array
     */
    public function simpleAnalyzer($text);

    /**
     * 空格分词器
     *
     * @param $text
     *
     * @return array
     */
    public function whitespaceAnalyzer($text);

    /**
     * 停用词分词器 （the in a）
     *
     * @param $text
     *
     * @return string
     */
    public function stopAnalyzer($text);

    /**
     * 整体分词器
     *
     * @param $text
     *
     * @return string
     */
    public function keywordAnalyzer($text);

    /**
     * 正则分词器
     *
     * @param $text
     *
     * @return string
     */
    public function patternAnalyzer($text);

    /**
     * 英文分词器  负数、时态
     *
     * @param $text
     *
     * @return string
     */
    public function englishAnalyzer($text);

    /**
     * 简单的中文分词器
     * 插件安装办法
     * elasticsearch_9500/bin/elasticsearch-plugin  install analysis-icu
     *
     * @param $text
     *
     * @return string
     */
    public function ICUAnalyzer($text);

    /**
     * 较好的中文分词器
     * 插件安装办法
     * elasticsearch-plugin  install https://github.com/medcl/elasticsearch-analysis-ik/releases/download/v7.8.1/elasticsearch-analysis-ik-7.8.1.zip
     *
     * @param $text
     *
     * @return string
     */
    public function IKAnalyzer($text);

    /**
     * 在索引中定义新的分词器
     *
     * @return string
     */
    public function mappingDefinitionAnalyzer();
}

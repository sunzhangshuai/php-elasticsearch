<?php
/**
 * TemplateInterface.php :
 *
 * PHP version 7.1
 *
 * @category TemplateInterface
 * @package  App\RestApi\Interfaces
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Interfaces;


interface TemplateInterface
{
    /**
     * 模板设置，静态模板
     *
     * @return array
     */
    public function IndexTemplate();

    /**
     * 动态模板、设置index的动态转换。
     *
     * @return array
     */
    public function dynamicTemplate();


    /**
     * @return array
     */
    public function copyTo();
}

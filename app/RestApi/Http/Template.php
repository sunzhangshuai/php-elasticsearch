<?php
/**
 * Template.php :
 *
 * PHP version 7.1
 *
 * @category Template
 * @package  App\RestApi\Http
 * @author   zhangshuai <zhangshaui1134@gmail.com>
 */

namespace App\RestApi\Http;


use App\RestApi\HttpElasticsearch;
use App\RestApi\Interfaces\TemplateInterface;

class Template extends HttpElasticsearch implements TemplateInterface
{

    /**
     * @inheritDoc
     */
    public function IndexTemplate()
    {
        // TODO: Implement IndexTemplate() method.
    }

    /**
     * @inheritDoc
     */
    public function dynamicTemplate()
    {
        // TODO: Implement dynamicTemplate() method.
    }

    /**
     * @inheritDoc
     */
    public function copyTo()
    {
        // TODO: Implement copyTo() method.
    }
}

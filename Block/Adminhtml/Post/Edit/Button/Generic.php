<?php

namespace Huang\HelloWorld\Block\Adminhtml\Post\Edit\Button;

use Magento\Backend\Block\Widget\Context;

class Generic
{
    protected $context;

    public function __construct(
        Context $context
    )
    {
        $this->context = $context;
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
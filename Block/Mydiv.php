<?php

namespace Huang\HelloWorld\Block;

class Mydiv extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    )
    {
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __($this->getData("css_class"));
    }
}

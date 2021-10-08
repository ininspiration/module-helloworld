<?php

namespace Huang\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;

class Test extends Action
{
    protected $_resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ){
        $this->_resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        echo "Hello World";
    }
}

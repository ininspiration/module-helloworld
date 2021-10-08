<?php

namespace Huang\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;

class Index extends Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        // ui component grid name
        //$resultPage->setActiveMenu('Huang_HelloWorld::grid_list');
        //$resultPage->setActiveMenu('Huang_HelloWorld::huang_helloworld_post_listing');

        $resultPage->getConfig()->getTitle()->prepend(__('huang UI Posts'));
        
        return $resultPage;
    }
}
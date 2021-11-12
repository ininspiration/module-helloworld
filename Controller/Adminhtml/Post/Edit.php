<?php

namespace Huang\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{
//    protected $resultPageFactory = false;
//
//    public function __construct(
//        \Magento\Backend\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $resultPageFactory
//    )
//    {
//        parent::__construct($context);
//
//        $this->resultPageFactory = $resultPageFactory;
//    }

    public function execute()
    {
        //$resultPage = $this->resultPageFactory->create();
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        // ui component grid name
        //$resultPage->setActiveMenu('Huang_HelloWorld::grid_list');
        //$resultPage->setActiveMenu('Huang_HelloWorld::huang_helloworld_post_listing');

        $resultPage->getConfig()->getTitle()->prepend(__('huang UI Edit Posts'));

        return $resultPage;
    }
}
<?php

namespace Huang\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    protected $_resultPageFactory;

    protected $_postFactory;

    protected $_logger;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,

        //这个Factory会自动生成
        \Huang\HelloWorld\Model\PostFactory $postFactory,

        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_resultPageFactory = $resultPageFactory;

        $this->_postFactory = $postFactory;

        $this->_logger = $logger;

        //saved in var/log/system.log
        $this->_logger->emergency("aaa-emergency");
        $this->_logger->alert("aaa-alert");
        $this->_logger->critical("aaa-critical");
        $this->_logger->error("aaa-error");
        $this->_logger->warning("aaa-warning");
        $this->_logger->notice("aaa-notice");
        $this->_logger->info("aaa-info");

        //saved in var/log/debug.log (does not work in production mode)
        //必须开启enable-debug-logging
        $this->_logger->debug("aaa-debug");

        return parent::__construct($context);
    }

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(['text' => 'aaa']);
        
        //触发事件
        $this->_eventManager->dispatch('huang_helloworld_display_text', ['textDisplay' => $textDisplay]);

        echo $textDisplay->getText();

        $post = $this->_postFactory->create();

        //list
        $collection = $post->getCollection();

        foreach($collection as $item){
            echo '<pre>';
            print_r($item->getData());
            echo '</pre>';
        }

        //exit();

        return $this->_resultPageFactory->create();
    }
}
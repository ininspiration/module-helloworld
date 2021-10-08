<?php

namespace Huang\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    protected $_resultPageFactory;

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,

        //这个Factory会自动生成
        \Huang\HelloWorld\Model\PostFactory $postFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;

        $this->_postFactory = $postFactory;

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
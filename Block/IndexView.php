<?php
namespace Huang\HelloWorld\Block;

class IndexView extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,

        //这个Factory会自动生成
        \Huang\HelloWorld\Model\PostFactory $postFactory
    ){
        $this->_postFactory = $postFactory;
        
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello Block');
    }

    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        
        return $post->getCollection();
    }
}
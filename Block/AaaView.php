<?php
namespace Huang\HelloWorld\Block;

class AaaView extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    protected $_postResourceFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,

        //这个Factory会自动生成
        \Huang\HelloWorld\Model\PostFactory $postFactory,
        \Huang\HelloWorld\Model\ResourceModel\PostFactory $postResourceFactory,
        \Huang\HelloWorld\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory
    )
    {
        $this->_postFactory = $postFactory;

        $this->_postResourceFactory = $postResourceFactory;
        $this->_postCollectionFactory = $postCollectionFactory;

        parent::__construct($context);
    }

    public function getFormUrl()
    {
        return $this->getUrl('helloworld/form/aaa');
    }

    public function getOne()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();

        $collection
            //where查询
            //->addFieldToFilter('post_id', ['=' => 24])

            ->getSelect()
            ->order("post_id desc")
            ->group("post_id")
            ->reset(\Zend_Db_Select::COLUMNS)
            ->columns(["post_id", "name"]);
        
        //单条记录的话，要用getFirstItem()来返回
        return $collection->getFirstItem();
    }

    public function getCount()
    {
        return $this->_postFactory->create()->getCollection()->count();
    }

    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        
        return $collection;
    }
}

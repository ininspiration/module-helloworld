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

    public function getPostCollection2()
    {

    }

    public function getPostCollection()
    {
        //第几页
        $page = ($this->getRequest()->getParam('p') && $this->getRequest()->getParam('p') > 0) ? $this->getRequest()->getParam('p') : 1;

        //每页显示几条
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5;

        $postCollection = $this->_postFactory->create()->getCollection();
        $postCollection->setPageSize($pageSize);
        $postCollection->setCurPage($page);

        //主表是main_table
        $postCollection->getSelect()
            ->joinLeft(
                //要join的表名，array（as）或string（手动输入表名）
                //["t2" => "admin_user"],
                "admin_user",

                //条件
                "main_table.post_id = admin_user.user_id"
            );

        //echo $postCollection->getSelect()->__toString();die;

        return $postCollection;

        /*
        $post = $this->_postFactory->create();
        return $post->getCollection();
        */
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if ($this->getPostCollection()) {

            //显示的分页工具条
            $pager = $this->getLayout()
                ->createBlock(
                    'Magento\Theme\Block\Html\Pager',
                    //'Your_module_namespace.Your_module_name.record.pager'
                    'Magento\Theme\Block\Html\Pager',
                )
                //显示在html上的 - perPage
                ->setAvailableLimit(array(10 => 10, 15 => 15, 20 => 20, 25 => 25))
                ->setShowPerPage(true)
                ->setCollection(
                    $this->getPostCollection()
                );

            $this->setChild('pager', $pager);
            $this->getPostCollection()->load();
        }

        return $this;
    }

    //显示的分页工具条
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
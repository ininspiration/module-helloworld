<?php

namespace Huang\HelloWorld\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    //主键ID名
    protected $_idFieldName = 'post_id';

    protected $_eventPrefix = 'huang_helloworld_post_collection';

    protected $_eventObject = 'post_collection';

    protected function _construct()
    {
        //1：普通model；2：资源model
        $this->_init(
            \Huang\HelloWorld\Model\Post::class,
            \Huang\HelloWorld\Model\ResourceModel\Post::class
        );
    }
}
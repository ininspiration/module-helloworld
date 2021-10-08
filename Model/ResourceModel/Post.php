<?php

namespace Huang\Helloworld\Model\ResourceModel;

//资源model的基类
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ){
        parent::__construct($context);
    }

    protected function _construct()
    {
        //数据表名，主键名
        $this->_init('huang_helloworld_post', 'post_id');
    }

//    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
//    {
//        if (!$object->getData("name")) {
//            throw new \Magento\Framework\Exception\LocalizedException(
//                __('The name must be set.')
//            );
//        }
//
//        return parent::_beforeSave($object);
//    }
}

<?php

namespace Huang\HelloWorld\Model;

//model的基类
use Magento\Framework\Model\AbstractModel;

//这是缓存用的接口
use Magento\Framework\DataObject\IdentityInterface;

class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'huang_helloworld_post';

    protected $_cacheTag = 'huang_helloworld_post';

    protected $_eventPrefix = 'huang_helloworld_post';

    protected function _construct()
    {
        //绑定资源模型
        $this->_init('Huang\HelloWorld\Model\ResourceModel\Post');
    }

    //返回一个唯一值
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
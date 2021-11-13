<?php

namespace Huang\HelloWorld\Block\Adminhtml\BbbPost;

class Bbb extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        //controller所在的文件夹
        $this->_controller = 'adminhtml_post';

        //{vendor}_{module}
        $this->_blockGroup = 'Huang_HelloWorld';

        //<title>
        $this->_headerText = __('bbb Post List');

        $this->_addButtonLabel = __('Create New Bbb Post');

        parent::_construct();
    }
}
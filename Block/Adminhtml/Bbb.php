<?php
namespace Huang\HelloWorld\Block\Adminhtml;

class Bbb extends \Magento\Backend\Block\Widget\Grid\Container
//class Bbb extends \Magento\Backend\Blcok\Widget\Grid\Container
{

    protected function _construct()
    {
        //controller所在的文件夹
        $this->_controller = 'adminhtml_post';

        //{vendor}_{module}
        $this->_blockGroup = 'Huang_HelloWorld';

        //<title>
        $this->_headerText = __('bbb');

        $this->_addButtonLabel = __('Create New Post');

        parent::_construct();
    }
}
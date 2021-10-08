<?php

namespace Huang\HelloWorld\Controller\Form;

use Magento\Framework\App\Action\Action;

class Bbb extends Action
{
    protected $resultJsonFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;

        return parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();
        $data = $this->getRequest()->getParam('name');
        $resultJson->setData(true);

        //验证成功
        if ($data == 'admin') {
            $resultJson->setData(true);
        } else {
            //状态码必须是200，否则提示信息不会显示出来。
            //$resultJson->setHttpResponseCode(422);

            $resultJson->setData('That name is already taken!');
        }

        return $resultJson;
    }
}

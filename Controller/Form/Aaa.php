<?php

namespace Huang\HelloWorld\Controller\Form;

use Magento\Framework\App\Action\Action;

//use Huang\HelloWorld\Model\Post;
//use Huang\HelloWorld\Model\ResourceModel\Post as PostResource;

class Aaa extends Action
{
    protected $_resultPageFactory;

    protected $_post;

    protected $_postResource;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,

        \Huang\HelloWorld\Model\Post $post,
        \Huang\HelloWorld\Model\ResourceModel\Post $postResource
    )
    {
        $this->_resultPageFactory = $resultPageFactory;

        $this->_post = $post;

        $this->_postResource = $postResource;

        parent::__construct($context);
    }

    public function execute()
    {
        //$this->_eventManager->dispatch("huang_helloworld_display_text");
        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $this->getRequest()->getParams();

            $validator = new \Huang\HelloWorld\Block\MyValidator();
            $validator->validate($data);
            if ($errors = $validator->getErrors()) {
                var_dump($errors);
                die;
            }

            $model = $this->_post;

            $model->setData($data);
            //$model->setData('name', $data["name"]);
            //$model->setData('post_content',  $data["content"] . time());

            //$model->save();
            $this->_postResource->save($model);

            /*
            $this->messageManager->addSuccessMessage("Post saved successfully!");
            $this->messageManager->addErrorMessage("something wrong!");
            */
        }

        return $this->_resultPageFactory->create();
    }
}
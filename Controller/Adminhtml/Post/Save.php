<?php

namespace Huang\HelloWorld\Controller\Adminhtml\Post;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var Blog
     */
    protected $uiExamplemodel;

    /**
     * @var Session
     */
    protected $adminsession;
    
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Huang\HelloWorld\Model\Post $uiExamplemodel,
        \Magento\Backend\Model\Session $adminsession
    ) {
        parent::__construct($context);
        $this->uiExamplemodel = $uiExamplemodel;
        $this->adminsession = $adminsession;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $post_id = $this->getRequest()->getParam('post_id');
            if ($post_id) {
                $this->uiExamplemodel->load($post_id);
            }

            $this->uiExamplemodel->setData($data);

            try {
                $this->uiExamplemodel->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->adminsession->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        $resultRedirect->setPath('*/*/add');

                        return $resultRedirect;
                    } else {
                        //$resultRedirect->setPath('*/*/edit', ['post_id' => $this->uiExamplemodel->getBlogId(), '_current' => true]);
                        $resultRedirect->setPath('*/*/index');

                        return $resultRedirect;
                    }
                }

                $resultRedirect->setPath('*/*/index');

                return $resultRedirect;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            $resultRedirect->setPath('*/*/edit', ['post_id' => $this->getRequest()->getParam('post_id')]);

            return $resultRedirect;
        }

        $resultRedirect->setPath('*/*/index');
        return $resultRedirect;
    }
}
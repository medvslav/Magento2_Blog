<?php

namespace Medvslav\Blog2\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
	/**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
	
    /**
     * Check the permission to run it
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Medvslav_Blog2::blog2_manage');
    }

    /**
     * Blog2 List action
     *
     * @return void
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(
            'Medvslav_Blog2::blog2_manage'
        )->addBreadcrumb(
            __('Blog2'),
            __('Blog2')
        )->addBreadcrumb(
            __('Manage Blog2'),
            __('Manage Blog2')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Blog2'));
        return $resultPage;
    }
}

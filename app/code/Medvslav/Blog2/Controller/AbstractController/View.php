<?php

namespace Medvslav\Blog2\Controller\AbstractController;

use Magento\Framework\App\Action;
use Magento\Framework\View\Result\PageFactory;

abstract class View extends Action\Action
{
    /**
     * @var \Medvslav\Blog2\Controller\AbstractController\Blog2LoaderInterface
     */
    protected $blog2Loader;
	
	/**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Action\Context $context
     * @param OrderLoaderInterface $orderLoader
	 * @param PageFactory $resultPageFactory
     */
    public function __construct(Action\Context $context, Blog2LoaderInterface $blog2Loader, PageFactory $resultPageFactory)
    {
        $this->blog2Loader = $blog2Loader;
		$this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Blog2 view page
     *
     * @return void
     */
    public function execute()
    {
        if (!$this->blog2Loader->load($this->_request, $this->_response)) {
            return;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
		return $resultPage;
    }
}

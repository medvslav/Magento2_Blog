<?php

namespace Medvslav\Blog2\Block;

/**
 * Blog2 content block
 */
class Blog2 extends \Magento\Framework\View\Element\Template
{
    /**
     * Blog2 collection
     *
     * @var Medvslav\Blog2\Model\ResourceModel\Blog2\Collection
     */
    protected $_blog2Collection = null;
    
    /**
     * Blog2 factory
     *
     * @var \Medvslav\Blog2\Model\Blog2Factory
     */
    protected $_blog2CollectionFactory;
    
    /** @var \Medvslav\Blog2\Helper\Data */
    protected $_dataHelper;
    
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Medvslav\Blog2\Model\ResourceModel\Blog2\CollectionFactory $blog2CollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Medvslav\Blog2\Model\ResourceModel\Blog2\CollectionFactory $blog2CollectionFactory,
        \Medvslav\Blog2\Helper\Data $dataHelper,
        array $data = []
    ) {
        $this->_blog2CollectionFactory = $blog2CollectionFactory;
        $this->_dataHelper = $dataHelper;
        parent::__construct(
            $context,
            $data
        );
    }
    
    /**
     * Retrieve blog2 collection
     *
     * @return Medvslav\Blog2\Model\ResourceModel\Blog2\Collection
     */
    protected function _getCollection()
    {
        $collection = $this->_blog2CollectionFactory->create();
        return $collection;
    }
    
    /**
     * Retrieve prepared blog2 collection
     *
     * @return Medvslav\Blog2\Model\ResourceModel\Blog2\Collection
     */
    public function getCollection()
    {
        if (is_null($this->_blog2Collection)) {
            $this->_blog2Collection = $this->_getCollection();
            $this->_blog2Collection->setCurPage($this->getCurrentPage());
            $this->_blog2Collection->setPageSize($this->_dataHelper->getBlog2PerPage());
            $this->_blog2Collection->setOrder('published_at','asc');
        }

        return $this->_blog2Collection;
    }
    
    /**
     * Fetch the current page for the blog2 list
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->getData('current_page') ? $this->getData('current_page') : 1;
    }
    
    /**
     * Return URL to item's view page
     *
     * @param Medvslav\Blog2\Model\Blog2 $blog2Item
     * @return string
     */
    public function getItemUrl($blog2Item)
    {
        return $this->getUrl('*/*/view', array('id' => $blog2Item->getId()));
    }
    
    /**
     * Return URL for resized Blog2 Item image
     *
     * @param Medvslav\Blog2\Model\Blog2 $item
     * @param integer $width
     * @return string|false
     */
    public function getImageUrl($item, $width)
    {
        return $this->_dataHelper->resize($item, $width);
    }
    
    /**
     * Get a pager
     *
     * @return string|null
     */
    public function getPager()
    {
        $pager = $this->getChildBlock('blog2_list_pager');
        if ($pager instanceof \Magento\Framework\Object) {
            $blog2PerPage = $this->_dataHelper->getBlog2PerPage();

            $pager->setAvailableLimit([$blog2PerPage => $blog2PerPage]);
            $pager->setTotalNum($this->getCollection()->getSize());
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(TRUE);
            $pager->setFrameLength(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            )->setJump(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame_skip',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            );

            return $pager->toHtml();
        }

        return NULL;
    }
}

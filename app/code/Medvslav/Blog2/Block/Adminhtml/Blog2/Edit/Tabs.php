<?php
namespace Medvslav\Blog2\Block\Adminhtml\Blog2\Edit;

/**
 * Admin blog2 left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('page_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Blog2 Information'));
    }
}

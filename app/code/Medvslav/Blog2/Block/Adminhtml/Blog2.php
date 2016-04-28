<?php
/**
 * Adminhtml blog2 list block
 *
 */
namespace Medvslav\Blog2\Block\Adminhtml;

class Blog2 extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_blog2';
        $this->_blockGroup = 'Medvslav_Blog2';
        $this->_headerText = __('Blog2');
        $this->_addButtonLabel = __('Add New Blog2');
        parent::_construct();
        if ($this->_isAllowedAction('Medvslav_Blog2::save')) {
            $this->buttonList->update('add', 'label', __('Add New Blog2'));
        } else {
            $this->buttonList->remove('add');
        }
    }
    
    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}

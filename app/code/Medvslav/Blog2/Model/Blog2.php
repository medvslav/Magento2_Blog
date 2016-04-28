<?php

namespace Medvslav\Blog2\Model;

/**
 * Blog2 Model
 *
 * @method \Medvslav\Blog2\Model\Resource\Page _getResource()
 * @method \Medvslav\Blog2\Model\Resource\Page getResource()
 */
class Blog2 extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Medvslav\Blog2\Model\ResourceModel\Blog2');
    }

}

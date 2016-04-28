<?php

namespace Medvslav\Blog2\Model\ResourceModel;

/**
 * Blog2 Resource Model
 */
class Blog2 extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('medvslav_blog2', 'blog2_id');
    }
}

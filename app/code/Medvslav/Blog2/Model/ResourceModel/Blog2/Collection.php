<?php

/**
 * Blog2 Resource Collection
 */
namespace Medvslav\Blog2\Model\ResourceModel\Blog2;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Medvslav\Blog2\Model\Blog2', 'Medvslav\Blog2\Model\ResourceModel\Blog2');
    }
}

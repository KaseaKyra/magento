<?php


namespace Mageplaza\GiftCard\Model\ResourceModel\GiftCard;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'giftcard_id';
    protected $_eventPrefix = 'giftcard_code_collection';
    protected $_eventObject = 'giftcard_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\GiftCard\Model\GiftCard', 'Mageplaza\GiftCard\Model\ResourceModel\GiftCard');
    }
}
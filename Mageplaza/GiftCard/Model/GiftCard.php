<?php


namespace Mageplaza\GiftCard\Model;


use Magento\Framework\Model\AbstractMode;
use Magento\Framework\DataObject\IdentityInterface;
use Mageplaza\GiftCard\Model\ResourceModel\GiftCard as GiftCardResource;
use Magento\Framework\App\Action\Context;


class GiftCard extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'giftcard_code';

    protected $_cacheTag = 'giftcard_code';

    protected $_eventPrefix = 'giftcard_code';

    protected $_giftcardResource;

    protected function _construct()
    {
        $this->_init('Mageplaza\GiftCard\Model\ResourceModel\GiftCard');
    }

    public function __construct(Context $context, GiftCardResource $giftcardResource)
    {
        $this->_giftcardResource = $giftcardResource;
        return parent::__construct($context);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function insertGiftCard($id, $code, $balance, $amountUsed, $creatFrom)
    {
        return $this->_giftcardResource->insertGiftCardResource($id, $code, $balance, $amountUsed, $creatFrom);
    }
}
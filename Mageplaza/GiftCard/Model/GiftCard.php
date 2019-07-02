<?php


namespace Mageplaza\GiftCard\Model;


use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Mageplaza\GiftCard\Model\ResourceModel\GiftCard as GiftCardResource;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class GiftCard extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'giftcard_code';

    protected $_cacheTag = 'giftcard_code';

    protected $_eventPrefix = 'giftcard_code';

    public $_giftcardResource;

    /**
     * GiftCard constructor.
     * @param $_giftcardResource
     */
    public function __construct(GiftCardResource $giftcardResource)
    {
        $this->_giftcardResource = $giftcardResource;
    }

    protected function _construct()
    {
        $this->_init('Mageplaza\GiftCard\Model\ResourceModel\GiftCard');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function insertGiftCard($id, $code, $balance, $amountUsed, $creatFrom)
    {
        return $this->_giftcardResource->insertGiftCardResource($id, $code, $balance, $amountUsed, $creatFrom);
    }

    public function deleteGiftCard($id)
    {
        return $this->_giftcardResource->deleteGiftCardResource($id);
    }

    public function updateGiftCard($id, $amountUsed)
    {
        return $this->_giftcardResource->updateGiftCardResource($id, $amountUsed);
    }
}
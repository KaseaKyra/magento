<?php


namespace Mageplaza\GiftCard\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\GiftCard\Model\GiftCard;

class Test extends Action
{
    protected $_pageFactory;

    protected $_giftcardModel;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        GiftCard $giftcardModel
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_giftcardModel = $giftcardModel;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $this->_giftcardModel->insertGiftCard(2, '2', '2', '2', '000000001');
//        $this->_giftcardModel->deleteGiftCard(2);
//        $this->_giftcardModel->updateGiftCard(1, '1');
    }
}
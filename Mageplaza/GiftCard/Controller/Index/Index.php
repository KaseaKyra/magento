<?php


namespace Mageplaza\GiftCard\Controller\Index;


use Magento\Framework\App\Action\Action;

class Index extends Action
{
    protected $_pageFactory;

    protected $_giftcardFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftcardFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_giftcardFactory = $giftcardFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $giftcards = $this->_giftcardFactory->create();
        $collection = $giftcards->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
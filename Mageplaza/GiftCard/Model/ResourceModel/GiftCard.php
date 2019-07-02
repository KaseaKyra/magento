<?php


namespace Mageplaza\GiftCard\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\View\Result\PageFactory;

class GiftCard extends AbstractDb
{
    protected $_pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('giftcard_code', 'giftcard_id');
    }

    public function insertGiftCardResource($id, $code, $balance, $amountUsed, $creatFrom)
    {
        $connection = $this->getConnection();
        $tableName = $connection->getTableName('giftcard_code');
        $sql = "INSERT INTO `$tableName` (`giftcard_id`, `code`, `balance`, `amount_used`, `create_from`, `created_at`) 
                VALUES ($id, '$code', '$balance', '$amountUsed', '$creatFrom', current_timestamp())";
        $connection->query($sql);

        $query = "SELECT * FROM $tableName";
        $results = $connection->fetchAll($query);

        foreach ($results as $result) {
            echo '<pre>';
            var_dump($result);
            echo '</pre>';
        }
    }

    public function deleteGiftCardResource($id)
    {
        $connection = $this->getConnection();
        $tableName = $connection->getTableName('giftcard_code');
        $sql = "DELETE FROM $tableName WHERE giftcard_id = $id";
        $connection->query($sql);

        $query = "SELECT * FROM $tableName";
        $results = $connection->fetchAll($query);

        foreach ($results as $result) {
            echo '<pre>';
            var_dump($result);
            echo '</pre>';
        }
    }

    public function updateGiftCardResource($id, $amountUsed)
    {
        $connection = $this->getConnection();
        $tableName = $connection->getTableName('giftcard_code');
        $sql = "UPDATE $tableName SET amount_used = $amountUsed WHERE giftcard_id = $id";
        $connection->query($sql);

        $query = "SELECT * FROM $tableName";
        $results = $connection->fetchAll($query);

        foreach ($results as $result) {
            echo '<pre>';
            var_dump($result);
            echo '</pre>';
        }
    }
}
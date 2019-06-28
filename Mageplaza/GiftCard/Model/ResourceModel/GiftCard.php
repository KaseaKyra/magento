<?php


namespace Mageplaza\GiftCard\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class GiftCard extends AbstractDb
{
    public function __construct(Context $context)
    {
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
}
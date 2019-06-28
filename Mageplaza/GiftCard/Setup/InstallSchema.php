<?php


namespace Mageplaza\GiftCard\Setup;


use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('giftcard_code')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('giftcard_code')
            )
                ->addColumn(
                    'giftcard_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                    ],
                    'Giftcard ID'
                )
                ->addColumn(
                    'code',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Code'
                )
                ->addColumn(
                    'balance',
                    Table::TYPE_DECIMAL,
                    '20,6',
                    ['nullable' => false, 'default' => '0.000000'],
                    'Balance'
                )
                ->addColumn(
                    'amount_used',
                    Table::TYPE_DECIMAL,
                    '20,6',
                    ['nullable' => false, 'default' => '0.000000'],
                    'Amount Used'
                )
                ->addColumn(
                    'create_from',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Create From'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Created At'
                )
                ->setComment('Giftcard Code');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('giftcard_code'),
                $setup->getIdxName(
                    $installer->getTable('giftcard_code'),
                    ['code', 'balance', 'amount_used', 'create_from'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['code', 'balance', 'amount_used', 'create_from'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}
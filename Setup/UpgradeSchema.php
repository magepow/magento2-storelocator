<?php
namespace Magepow\StoreLocator\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $connection = $setup->getConnection();
        $tableName = $setup->getTable('google_store');


        $connection->addIndex(
            $tableName,
            'search',
            [
                'image',
                'link'
            ],
            \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
        );

        $setup->endSetup();
    }
}

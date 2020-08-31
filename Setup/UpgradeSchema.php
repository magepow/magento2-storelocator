<?php
///**
// * Magepow
// * @category Magepow
// * @copyright Copyright (c) 2014 Magepow (<https://www.magepow.com>)
// * @license <https://www.magepow.com/license-agreement.html>
// * @Author: magepow<support@magepow.com>
// * @github: <https://github.com/magepow>
// * @@Create Date: 2020-08-08 22:55:21
// * @@Modify Date: 2020-09-01 00:21:25
// */
//namespace Magepow\StoreLocator\Setup;
//
//use Magento\Framework\Setup\SchemaSetupInterface;
//use Magento\Framework\Setup\ModuleContextInterface;
//use Magento\Framework\DB\Ddl\Table;
//
//class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
//{
//
//    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
//    {
//        $setup->startSetup();
//
//        $connection = $setup->getConnection();
//        $tableName = $setup->getTable('magepow_googlestorelocator');
//
//
//        $connection->addIndex(
//            $tableName,
//            'search',
//            [
//                'image',
//                'link'
//            ],
//            \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//        );
//
//        $setup->endSetup();
//    }
//}

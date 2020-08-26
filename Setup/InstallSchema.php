<?php

namespace Magepow\StoreLocator\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();


        $table = $installer->getConnection()->newTable(
            $installer->getTable('working_time')
        )->addColumn(
            'time_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
            'Time Id'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Time Name'
        )->addColumn(
            'Monday',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Monday'
        )->addColumn(
            'Tuesday',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Tuesday'
        )->addColumn(
            'Wednesday',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Wednesday'
        )->addColumn(
            'Thursday',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Thursday'
        )->addColumn(
            'Friday',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Friday'
        )->addColumn(
            'saturday',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Saturday'
        )->addColumn(
            'sunday',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Sunday'
        )->setOption('charset', 'utf8');
        $installer->getConnection()->createTable($table);


//        $table = $installer->getConnection()->newTable(
//            $installer->getTable('trademark')
//        )->addColumn(
//            'trademark_id',
//            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
//            null,
//            ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
//            'trademark_id'
//        )->addColumn(
//            'name_trademark',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//            255,
//            ['nullable' => true],
//            'Name Trademark'
//        )->setOption('charset', 'utf8');;
//        $installer->getConnection()->createTable($table);





        $table = $installer->getConnection()->newTable(
            $installer->getTable('google_store')
        )->addColumn(
            'gmaps_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Gmaps ID'
        )->addColumn(
            'store_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Name'
        )->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Image store'
        )->addColumn(
            'store_city',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [],
            'City'
        )->addColumn(
            'address',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [],
            'Store Address'
        )->addColumn(
            'identifier',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'URL Key'
        )->addColumn(
            'latitude',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Latitude'
        )->addColumn(
            'longitude',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Longitude'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [],
            'Description'
        )->addColumn(
            'store_description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            [],
            'Store Description'
        )->addColumn(
            'position',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Position'
        )->addColumn(
            'country',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Country'
        )->addColumn(
            'time_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Time Id'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Store Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Store Modification Time'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1'],
            'Is Store Active'
        )->addForeignKey(
            $installer->getFkName('google_store', 'time_id', 'working_time', 'time_id'),
            'time_id',
            $installer->getTable('working_time'),
            'time_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
        )->addIndex(
            $setup->getIdxName(
                $installer->getTable('google_store'),
                ['store_name'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            ['store_name'],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        )->setOption('charset', 'utf8');
        $installer->getConnection()->createTable($table);


        $installer->endSetup();
    }
}

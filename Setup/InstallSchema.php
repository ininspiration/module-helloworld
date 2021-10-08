<?php

namespace Huang\HelloWorld\Setup;

use Magento\Framework\DB\Ddl\Table;
//use Aqrun\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    )
    {
        $installer = $setup;
        $installer->startSetup();

        if ($installer->tableExists('huang_helloworld_post')) {
            return;
        }

        //创建table
        $table = $installer->getConnection()->newTable(
            $installer->getTable('huang_helloworld_post')
        )->addColumn(
            'post_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true,
                'unsigned' => true,
            ],
            'Post ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => false,
            ],
            'Post name'
        )->addColumn(
            'url_key',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => false,
            ],
            'Post URL Key'
        )->addColumn(
            'post_content',
            Table::TYPE_TEXT,
            '64k',
            [],
            'Post Content'
        )->addColumn(
            'tags',
            Table::TYPE_TEXT,
            255,
            [],
            'Post Tags'
        )->addColumn(
            'status',
            Table::TYPE_INTEGER,
            1,
            [],
            'Post Status'
        )->addColumn(
            'featured_image',
            Table::TYPE_TEXT,
            255,
            [],
            'Post Featured Image'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT,
            ],
            'Created At'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT_UPDATE,
            ],
            'Updated At'
        )->setComment('Post Table');

        $installer->getConnection()->createTable($table);
        
        $installer->getConnection()->addIndex(
            $installer->getTable('huang_helloworld_post'),
            $setup->getIdxName(
                //$installer->getTable('mageplaza_helloworld_post'),
                $installer->getTable('huang_helloworld_post'),
                ['name', 'url_key', 'post_content', 'tags', 'featured_image'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            ['name','url_key','post_content','tags','featured_image',],
            \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
        );

        $installer->endSetup();
    }
}

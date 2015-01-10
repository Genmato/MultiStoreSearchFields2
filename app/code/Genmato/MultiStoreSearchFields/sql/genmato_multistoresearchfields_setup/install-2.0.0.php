<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

/* @var $installer \Magento\Setup\Module\SetupModule */
$installer = $this;

$installer->startSetup();

/**
 * Create table 'cms_block'
 */
    $table = $installer->getConnection()->newTable(
        $installer->getTable('genmato_multistoresearchfields_attribute_search_store')
    )->addColumn(
        'attribute_id',
        \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
        null,
        ['unsigned' => true, 'nullable' => false],
        'Attribute ID'
    )->addColumn(
        'store_id',
        \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
        null,
        ['unsigned' => true, 'nullable' => false, 'default' => '0'],
        'Store ID'
    )->addIndex(
        $installer->getIdxName('genmato_multistoresearchfields_attribute_search_store', ['store_id']),
        ['store_id']
    )
    ->addForeignKey(
        $installer->getFkName('genmato_multistoresearchfields_attribute_search_store', 'store_id', 'store', 'store_id'),
        'store_id',
        $installer->getTable('store'),
        'store_id',
        \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE,
        \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName(
            'genmato_multistoresearchfields_attribute_search_store',
            'attribute_id',
            'eav_attribute',
            'attribute_id'
        ),
        'attribute_id',
        $installer->getTable('eav_attribute'),
        'attribute_id',
        \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE,
        \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
    )->setComment(
        'Attribute Advanced Search Store'
    );
$installer->getConnection()->createTable($table);

$installer->endSetup();

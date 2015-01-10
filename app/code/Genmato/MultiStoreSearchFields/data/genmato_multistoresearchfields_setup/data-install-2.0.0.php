<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

/** @var $installer \Magento\Catalog\Model\Resource\Setup */
$installer = $this;

$connection = $installer->getConnection();

$select = $connection->select();
$select->from(
    ['catalog_eav_attribute' => $installer->getTable('catalog_eav_attribute')],
    [
        'attribute_id',
        'store_id' => new \Zend_Db_Expr(0),
    ]
);

$connection->query(
    $connection->insertFromSelect(
        $select,
        $installer->getTable('genmato_multistoresearchfields_attribute_search_store'),
        ['attribute_id','store_id']
    )
);
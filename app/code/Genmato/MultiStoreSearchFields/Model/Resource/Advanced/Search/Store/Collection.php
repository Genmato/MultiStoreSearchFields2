<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

namespace Genmato\MultiStoreSearchFields\Model\Resource\Advanced\Search\Store;

class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{

    /**
     * Initialize resource
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Genmato\MultiStoreSearchFields\Model\Advanced\Search\Store',
            'Genmato\MultiStoreSearchFields\Model\Resource\Advanced\Search\Store'
        );
    }
}
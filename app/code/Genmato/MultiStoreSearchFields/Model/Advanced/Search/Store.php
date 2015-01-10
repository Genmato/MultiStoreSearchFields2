<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

namespace Genmato\MultiStoreSearchFields\Model\Advanced\Search;

class Store extends \Magento\Framework\Model\AbstractModel
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Genmato\MultiStoreSearchFields\Model\Resource\Advanced\Search\Store');
    }

}
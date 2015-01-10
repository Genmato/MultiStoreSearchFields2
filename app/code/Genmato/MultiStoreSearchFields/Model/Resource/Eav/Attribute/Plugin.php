<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

namespace Genmato\MultiStoreSearchFields\Model\Resource\Eav\Attribute;

class Plugin
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /** @var Logger */
    protected $logger;

    /**
     * @param \Magento\Store\Model\System\Store         $systemStore
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->_systemStore = $systemStore;
        $this->_objectManager = $objectManager;
    }


    public function afterLoad(\Magento\Catalog\Model\Resource\Eav\Attribute $subject, $attribute)
    {
        $storeIds = $this->_objectManager->get(
            'Genmato\MultiStoreSearchFields\Model\Resource\Advanced\Search\Store'
        )->getStoreIds($attribute->getId());

        if (count($storeIds)==0) {
            $storeIds = [0];
        }
        $attribute->setData('advanced_search_store_ids', $storeIds);
    }

    public function afterSave(\Magento\Catalog\Model\Resource\Eav\Attribute $subject, $attribute)
    {
        $advSearchStores = $this->_objectManager->get(
            'Genmato\MultiStoreSearchFields\Model\Resource\Advanced\Search\Store'
        );

        $oldStores = $advSearchStores->getStoreIds($attribute->getId());
        $newStores = (array)$attribute->getAdvancedSearchStoreIds();

        // If no stores are selected or all stores and stores are selected set only to all stores value
        if (empty($newStores) || (count($newStores)>1 && in_array(0, $newStores))) {
            $newStores = [0];
        }
        $insert = array_diff($newStores, $oldStores);
        $delete = array_diff($oldStores, $newStores);

        if ($delete) {
            $advSearchStores->deleteStoreIds($attribute->getId(), $delete);
        }
        if ($insert) {
            $advSearchStores->saveStoreIds($attribute->getId(), $insert);
        }
    }
}
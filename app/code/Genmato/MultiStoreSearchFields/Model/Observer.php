<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

namespace Genmato\MultiStoreSearchFields\Model;

class Observer
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
    /**
     * Add store selection field to fieldset
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function addStoreFieldToForm(\Magento\Framework\Event\Observer $observer)
    {
        $form = $observer->getEvent()->getData('form');

        $elements = $form->getElements();

        $fieldset = $elements->searchById('front_fieldset');

        $fieldset->addField(
            'advanced_search_store_ids',
            'multiselect',
            [
                'name' => 'advanced_search_store_ids[]',
                'label' => __('Advanced Search Store(s)'),
                'title' => __('Advanced Search Store(s)'),
                'value' => 0,
                'values' => $this->_systemStore->getStoreValuesForForm(false, true),
            ],
            'is_visible_in_advanced_search'
        );
    }

}
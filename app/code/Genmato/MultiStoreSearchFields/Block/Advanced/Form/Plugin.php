<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

namespace Genmato\MultiStoreSearchFields\Block\Advanced\Form;

class Plugin
{

    /**
     * Core store config
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;
    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
    }

    public function afterGetSearchableAttributes(\Magento\CatalogSearch\Block\Advanced\Form $subject, $result)
    {
        $fields = trim($this->getStoreConfig('multistoresearchfields/config/attributes'));

        if ($fields == '') {
            return $result;
        }

        $attrFields = explode(',', $fields);
        foreach ($result as $attrKey => $attribute) {
            if (!in_array($attribute->getAttributeCode(), $attrFields)) {
                $result->removeItemByKey($attrKey);
            }
        }

        return $result;
    }

    /**
     * @param      $path
     * @param null $store
     *
     * @return string
     */
    protected function getStoreConfig($path, $store = null)
    {
        return $this->_scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store);
    }
}
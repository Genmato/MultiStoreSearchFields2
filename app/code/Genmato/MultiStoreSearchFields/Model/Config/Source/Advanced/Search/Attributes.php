<?php
/**
 * @category    Genmato
 * @package     Genmato_MultiStoreSearchFields
 * @copyright   Copyright (c) 2015 Genmato BV (https://genmato.com)
 */

namespace Genmato\MultiStoreSearchFields\Model\Config\Source\Advanced\Search;
use Magento\Catalog\Model\Resource\Eav\Attribute;
use Magento\Catalog\Model\Resource\Product\Attribute\CollectionFactory;

class Attributes implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var array
     */
    protected $attributes;

    /**
     * Attribute collection factory
     *
     * @var CollectionFactory
     */
    protected $_attributeCollectionFactory;


    /**
     * Construct
     *
     * @param CollectionFactory $attributeCollectionFactory
     * @param array $data
     */
    public function __construct(
        CollectionFactory $attributeCollectionFactory,
        array $data = []
    ) {
        $this->_attributeCollectionFactory = $attributeCollectionFactory;
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function toOptionArray()
    {
        if (!$this->attributes) {
            $attributes = $this->_attributeCollectionFactory
                ->create()
                ->addHasOptionsFilter()
                ->addDisplayInAdvancedSearchFilter()
                ->setOrder('main_table.attribute_id', 'asc')
                ->load();

            $this->attributes = [];
            foreach ($attributes as $attribute) {
                $this->attributes[] = [
                    'label' => __($attribute->getFrontendLabel()),
                    'value' => $attribute->getAttributeCode()
                ];
            }
        }

        return $this->attributes;
    }
}

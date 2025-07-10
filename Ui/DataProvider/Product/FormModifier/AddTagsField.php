<?php

namespace Hassan\ProductTags\Ui\DataProvider\Product\FormModifier;

use Magento\Ui\DataProvider\Modifier\ModifierInterface;

class AddTagsField implements ModifierInterface
{
    public function modifyMeta(array $meta)
    {
        // Add the 'hassan_tags' field to the 'product-details' fieldset
        $meta['product-details']['children']['hassan_tags'] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Strativ Tags'),
                        'componentType' => 'field',
                        'formElement' => 'input',
                        'dataScope' => 'hassan_tags',
                        'dataType' => 'text',
                        'sortOrder' => 1000,
                        'notice' => __('Enter comma-separated tags'),
                    ],
                ],
            ],
        ];

        return $meta;
    }

    public function modifyData(array $data)
    {
        // Load tags for the product if they exist and prepare as comma-separated string
        foreach ($data as $productId => &$productData) {
            if (isset($productData['entity_id'])) {
                $tags = [];

                if (isset($productData['hassan_tags']) && is_array($productData['hassan_tags'])) {
                    $tags = $productData['hassan_tags'];
                }

                // Join tags array to string if needed
                if (is_array($tags)) {
                    $productData['hassan_tags'] = implode(', ', $tags);
                }
            }
        }

        return $data;
    }
}

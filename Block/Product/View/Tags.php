<?php

namespace Hassan\ProductTags\Block\Product\View;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\Product;
use Magento\Framework\Registry;
use Magento\Framework\App\ResourceConnection;

class Tags extends Template
{
    protected $registry;
    protected $connection;

    public function __construct(
        Template\Context $context,
        Registry $registry,
        ResourceConnection $resourceConnection,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->connection = $resourceConnection->getConnection();
        parent::__construct($context, $data);
    }

    /**
     * Get current product
     */
    public function getProduct(): ?Product
    {
        return $this->registry->registry('current_product');
    }

    /**
     * Get tags for current product
     */
    public function getTags(): array
    {
        $product = $this->getProduct();
        if (!$product) {
            return [];
        }

        $productId = (int)$product->getId();
        $select = $this->connection->select()
            ->from('hassan_product_tags', ['tag'])
            ->where('product_id = ?', $productId);

        $results = $this->connection->fetchCol($select);
        return $results ?? [];
    }
}

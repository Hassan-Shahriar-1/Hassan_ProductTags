<?php

namespace Hassan\ProductTags\Model;

use Hassan\ProductTags\Api\TagRepositoryInterface;
use Hassan\ProductTags\Model\TagFactory;
use Hassan\ProductTags\Model\ResourceModel\Tag as TagResource;
use Hassan\ProductTags\Model\ResourceModel\Tag\CollectionFactory;

class TagRepository implements TagRepositoryInterface
{
    protected $tagFactory;
    protected $tagResource;
    protected $collectionFactory;

    public function __construct(
        TagFactory $tagFactory,
        TagResource $tagResource,
        CollectionFactory $collectionFactory
    ) {
        $this->tagFactory = $tagFactory;
        $this->tagResource = $tagResource;
        $this->collectionFactory = $collectionFactory;
    }

    public function save(Tag $tag)
    {
        $this->tagResource->save($tag);
        return $tag;
    }

    public function getByProductId(int $productId)
    {
        return $this->collectionFactory->create()->addFieldToFilter('product_id', $productId);
    }

    public function deleteByProductId(int $productId)
    {
        $tags = $this->getByProductId($productId);
        foreach ($tags as $tag) {
            $tag->delete();
        }
    }
}

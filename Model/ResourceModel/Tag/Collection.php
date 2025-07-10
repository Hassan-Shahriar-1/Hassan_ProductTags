<?php

namespace Hassan\ProductTags\Model\ResourceModel\Tag;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hassan\ProductTags\Model\Tag;
use Hassan\ProductTags\Model\ResourceModel\Tag as TagResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Tag::class, TagResource::class);
    }
}

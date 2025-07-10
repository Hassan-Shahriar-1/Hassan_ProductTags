<?php

namespace Hassan\ProductTags\Model;

use Magento\Framework\Model\AbstractModel;

class Tag extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Tag::class);
    }
}

<?php

namespace Hassan\ProductTags\Api;

use Hassan\ProductTags\Model\Tag;

interface TagRepositoryInterface
{
    public function save(Tag $tag);
    public function getByProductId(int $productId);
    public function deleteByProductId(int $productId);
}

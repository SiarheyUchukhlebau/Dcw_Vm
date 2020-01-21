<?php

namespace Dcw\Vm\Plugin\Product;

class Gallery
{
    public function afterCreateBatchBaseSelect(
        \Magento\Catalog\Model\ResourceModel\Product\Gallery $subject,
        \Magento\Framework\DB\Select $select
    ) {
        $select->columns('vm');

        return $select;
    }
}

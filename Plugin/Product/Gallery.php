<?php

namespace Dcw\Vm\Plugin\Product;

class Gallery
{
    /**
     * Add new columns to the regular media gallery select
     *
     * @param \Magento\Catalog\Model\ResourceModel\Product\Gallery $subject
     * @param \Magento\Framework\DB\Select $select
     * @return \Magento\Framework\DB\Select
     */
    public function afterCreateBatchBaseSelect(
        \Magento\Catalog\Model\ResourceModel\Product\Gallery $subject,
        \Magento\Framework\DB\Select $select
    ) {
        $select->columns(['vm', 'custom_image_link']);

        return $select;
    }
}

<?php

namespace Dcw\Vm\Plugin;

class Product
{
    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param \Magento\Framework\Data\Collection $result
     * @return mixed
     */
    public function afterGetMediaGalleryImages(\Magento\Catalog\Model\Product $subject, $result)
    {
        foreach ($result as $key => $image) {
            if ($image['vm']) {
                $result->removeItemByKey($key);
            }
        }

        return $result;
    }
}

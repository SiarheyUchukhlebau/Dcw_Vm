<?php

namespace Dcw\Vm\Observer;

use Magento\Framework\Event\ObserverInterface;

class ProductSaveAfter implements ObserverInterface
{

    protected $request;
    protected $resource;

    /**
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Magento\Framework\App\ResourceConnection $resource \
     */
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\App\ResourceConnection $resource
    ) {
        $this->request  = $request;
        $this->resource = $resource;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $data = $this->request->getPostValue();

        if (isset($data['product']['media_gallery']['images'])) {
            // print_r($images);exit;
            $connection   = $this->resource->getConnection();
            $tableName    = $this->resource->getTableName('catalog_product_entity_media_gallery'); //gives table name with prefix
            $product      = $observer->getProduct();
            $mediaGallery = $product->getMediaGallery();

            if (isset($mediaGallery['images'])) {
                foreach ($mediaGallery['images'] as $image) {
                    //Update Data into table
                    $vmValue = !empty($image['vm']) ? (int)$image['vm'] : 0;
                    $customImageLinkValue = !empty($image['custom_image_link']) ? $image['custom_image_link'] : '';

                    $sql     = "UPDATE " . $tableName . " SET vm = ?, custom_image_link = ? WHERE value_id = ?";
                    $connection->query($sql, [$vmValue, $customImageLinkValue, $image['value_id']]);
                }
            }
        }
    }

}

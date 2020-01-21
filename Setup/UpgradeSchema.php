<?php

namespace Dcw\Vm\Setup;

use Magento\Catalog\Model\ResourceModel\Product\Gallery;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @inheritDoc
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->addColumn(
            $setup->getTable(Gallery::GALLERY_TABLE),
            'custom_image_link',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'unsigned' => true,
                'nullable' => true,
                'comment' => 'Custom Image Link'
            ]
        );

        $setup->endSetup();
    }
}

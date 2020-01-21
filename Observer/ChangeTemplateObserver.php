<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Dcw\Vm\Observer;

use Magento\Framework\Event\ObserverInterface;

class ChangeTemplateObserver extends \Magento\ProductVideo\Observer\ChangeTemplateObserver
{
    /**
     * @param mixed $observer
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $observer->getBlock()->setTemplate('Dcw_Vm::helper/gallery.phtml');
    }
}

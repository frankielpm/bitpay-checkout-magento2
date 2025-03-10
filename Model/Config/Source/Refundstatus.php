<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bitpay\BPCheckout\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Refund Status Model
 */
class Refundstatus implements ArrayInterface
{
    public function toOptionArray(): array
    {
        return [
            ['value' => 'closed', 'label' => __('True')],
            ['value' => 'ignore', 'label' => __('False')]
        ];
    }
}

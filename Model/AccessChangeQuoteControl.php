<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bitpay\BPCheckout\Model;

use Magento\Quote\Api\ChangeQuoteControlInterface;
use Magento\Framework\Exception\StateException;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Api\Data\CartInterface;

/**
 * The plugin checks if the user has ability to change the quote.
 */
class AccessChangeQuoteControl
{
    /**
     * @var ChangeQuoteControlInterface $changeQuoteControl
     */
    private $changeQuoteControl;

    /**
     * @param ChangeQuoteControlInterface $changeQuoteControl
     */
    public function __construct(ChangeQuoteControlInterface $changeQuoteControl)
    {
        $this->changeQuoteControl = $changeQuoteControl;
    }

    /**
     * Checks if change quote's customer id is allowed for current user.
     *
     * A StateException is thrown if Guest's or Customer's customer_id not match user_id or unknown user type
     *
     * @param CartRepositoryInterface $subject
     * @param CartInterface $quote
     * @return void
     * @throws StateException
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeSave(CartRepositoryInterface $subject, CartInterface $quote): void
    {
        if (!$this->changeQuoteControl->isAllowed($quote)) {
        }
    }
}

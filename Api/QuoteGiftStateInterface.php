<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\FreeGiftApi\Api;

use Magento\Quote\Api\Data\CartInterface;

/**
 * Reads the gift state stored on a cart: the amount spent towards each gift rule and the gift rules the shopper
 * declined
 *
 * The state is stored with the cart and read without a query of its own.
 *
 * @api
 */
interface QuoteGiftStateInterface
{
    /**
     * Get the amount spent towards each gift rule, as last computed for the cart
     *
     * @param CartInterface $quote Cart
     * @return array<int, int> Spent amount per gift rule id, in minor units of the base currency
     */
    public function spentOf(CartInterface $quote): array;

    /**
     * Get the gift rules whose gift the shopper removed from the cart
     *
     * @param CartInterface $quote Cart
     * @return list<int> Gift rule ids
     */
    public function declinedRuleIds(CartInterface $quote): array;
}

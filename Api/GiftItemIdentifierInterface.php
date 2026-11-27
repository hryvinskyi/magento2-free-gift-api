<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\FreeGiftApi\Api;

use Magento\Quote\Model\Quote\Item\AbstractItem;

/**
 * Tells a gift line of a cart from a line the shopper bought
 *
 * @api
 */
interface GiftItemIdentifierInterface
{
    /**
     * Get the id of the gift rule that put the line in the cart
     *
     * @param AbstractItem $item Cart line, or the line of a cart address
     * @return int|null Positive rule id, or null for a line the shopper bought
     */
    public function ruleIdOf(AbstractItem $item): ?int;

    /**
     * Check whether a gift rule put the line in the cart
     *
     * @param AbstractItem $item Cart line, or the line of a cart address
     * @return bool
     */
    public function isGift(AbstractItem $item): bool;
}

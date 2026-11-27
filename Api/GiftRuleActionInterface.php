<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\FreeGiftApi\Api;

/**
 * The cart price rule action whose rules give gifts for every step of spending
 *
 * A rule with this action keeps every native setting of a cart price rule (websites, customer groups, dates, coupon,
 * conditions, priority); its Discount Amount is the number of gifts per step, its Discount Qty Step the amount to
 * spend per step, and its Maximum Qty Discount is Applied To the most gifts a cart earns.
 *
 * @api
 */
interface GiftRuleActionInterface
{
    /**
     * Code of the action, stored in the rule's `simple_action`
     */
    public const CODE = 'free_gift_spent';
}

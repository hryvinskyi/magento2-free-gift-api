<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\FreeGiftApi\Api;

/**
 * Finds the mark of a past gift in a request to add a product to a cart
 *
 * An order item and a wish list entry keep the request their product was added with. When that product was a free
 * gift, the request carries a mark of the module that gave it, so a reorder or a move from the wish list would add the
 * gift again as a line the shopper pays for. A cart refuses a request in which any mark finds a past gift. Each module
 * that gives gifts, or gave them before, contributes the mark it writes.
 *
 * @api
 */
interface PastGiftMarkInterface
{
    /**
     * Get the gift rule a request names as a past gift
     *
     * @param array<mixed> $buyRequest Fields of a request to add a product, such as the request an order item keeps
     * @return int|null Positive id of the rule that gave the gift, or null when the request carries no such mark
     */
    public function ruleIdIn(array $buyRequest): ?int;
}

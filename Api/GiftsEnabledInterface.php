<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\FreeGiftApi\Api;

/**
 * Tells whether a store view gives free gifts at all
 *
 * A store view where free gifts are off puts no gift line into a cart and offers no gift goal, whatever the gift rules
 * of its website say.
 *
 * @api
 */
interface GiftsEnabledInterface
{
    /**
     * Check whether a store view gives free gifts
     *
     * @param int $storeId Store view id
     * @return bool
     */
    public function inStore(int $storeId): bool;
}

<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\FreeGiftApi\Api;

use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Reads and replaces the gift SKUs of cart price rules
 *
 * Every SKU of a rule is given when the rule earns gifts, in the order the SKUs were saved.
 *
 * @api
 */
interface GiftRuleSkusInterface
{
    /**
     * Data key that carries a rule's gift SKUs on the cart price rule being saved: a comma or new-line separated
     * text, or a list; a save without the key leaves the stored SKUs as they are
     */
    public const RULE_DATA_KEY = 'free_gift_skus';

    /**
     * Get the gift SKUs of a rule
     *
     * @param int $ruleId Cart price rule id
     * @return list<string> In their saved order; empty for a rule without gifts
     */
    public function skusOf(int $ruleId): array;

    /**
     * Get the gift SKUs of several rules with one read
     *
     * @param list<int> $ruleIds Cart price rule ids
     * @return array<int, list<string>> SKUs in their saved order per requested rule id; an empty list for a rule
     *     without gifts
     */
    public function skusOfRules(array $ruleIds): array;

    /**
     * Replace the gift SKUs of a rule
     *
     * Each SKU is trimmed; empty SKUs and repeats (compared without regard to letter case) are dropped, and the first
     * occurrence keeps its place in the order. An empty list removes every gift SKU of the rule.
     *
     * @param int $ruleId Cart price rule id
     * @param list<string> $skus Gift SKUs in the order they are given
     * @return void
     * @throws CouldNotSaveException When the SKUs cannot be written, the rule's previous SKUs then stay
     */
    public function replace(int $ruleId, array $skus): void;
}

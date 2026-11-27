# Magento 2 Free Gift API

The published contracts of the free gift modules: the cart price rule action that gives gifts for every step of spending, the gift SKUs of a rule, the gift lines of a cart, the gift state stored on a cart, the marks of past gifts and whether a store view gives gifts. A module that needs to know about gifts depends on this package and not on the module that implements it.

## What it publishes

| Contract | What it gives |
|---|---|
| `Hryvinskyi\FreeGiftApi\Api\GiftRuleActionInterface` | The constant `CODE` (`free_gift_spent`): the value of `simple_action` on a cart price rule that gives gifts for every step of spending. For such a rule Discount Amount is the number of gifts per step, Discount Qty Step the amount to spend per step and Maximum Qty Discount is Applied To the most gifts a cart earns. |
| `Hryvinskyi\FreeGiftApi\Api\GiftItemIdentifierInterface` | `ruleIdOf($item)` returns the id of the gift rule that put a cart line in the cart, or `null` for a line the shopper bought; `isGift($item)` answers yes or no. It takes a cart line or the line of a cart address. |
| `Hryvinskyi\FreeGiftApi\Api\GiftRuleSkusInterface` | `skusOf($ruleId)` and `skusOfRules($ruleIds)` read the gift SKUs of one or several rules in their saved order (the second with one read); `replace($ruleId, $skus)` replaces them. Each SKU is trimmed; empty SKUs and repeats (compared without regard to letter case) are dropped, and the first occurrence keeps its place. An empty list removes every gift SKU of the rule. A failed write throws `CouldNotSaveException` and the rule's previous SKUs stay. The constant `RULE_DATA_KEY` (`free_gift_skus`) is the data key that carries a rule's gift SKUs on a rule being saved; a save without it leaves the stored SKUs as they are. |
| `Hryvinskyi\FreeGiftApi\Api\PastGiftMarkInterface` | `ruleIdIn(array $buyRequest)` returns the positive id of the gift rule a request to add a product names as a past gift (the stored buy request of an order item or a wish list entry), or `null` when the request carries no mark of the module that implements it. A cart refuses a request in which any registered mark finds a past gift. A module contributes its mark to `Hryvinskyi\FreeGift\Model\PastGiftMark\CompositePastGiftMark` (see the README of `hryvinskyi/magento2-free-gift`); asking for the interface gives that composite. |
| `Hryvinskyi\FreeGiftApi\Api\GiftsEnabledInterface` | `inStore($storeId)` tells whether a store view gives free gifts at all. Where it does not, carts hold no gift line and no gift goal is offered. |
| `Hryvinskyi\FreeGiftApi\Api\QuoteGiftStateInterface` | `spentOf($quote)` returns the amount spent towards each gift rule as last computed for the cart, per rule id, in minor units (hundredths) of the base currency; `declinedRuleIds($quote)` returns the gift rules whose gift the shopper removed from the cart. The state is stored with the cart row, so reading it costs no query. |

All six interfaces are marked `@api`. Each is given an implementation by `hryvinskyi/magento2-free-gift`.

## Requirements

- PHP 8.1 to 8.5.
- The platform's Framework and Quote modules (what `composer.json` and `etc/module.xml` declare).

## Installation

The package comes with the free gift pack:

```bash
composer require hryvinskyi/magento2-free-gift-pack
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

A module that only reads gifts requires `hryvinskyi/magento2-free-gift-api` in its own `composer.json` and types its constructor on the interfaces above.

## Limits

- The package holds no implementation and no setting. Without `hryvinskyi/magento2-free-gift` the interfaces have no preference, and a class that asks for one fails when the container resolves it.
- How a gift line is marked on the cart line is not part of the contract: ask `GiftItemIdentifierInterface`.

# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-11-27

### Added
- `GiftRuleActionInterface::CODE` (`free_gift_spent`): the cart price rule action whose rules give gifts for every
  step of spending.
- `GiftItemIdentifierInterface`: tells a gift line of a cart, and the rule that added it, from a bought line.
- `GiftRuleSkusInterface`: reads the gift SKUs of one or several rules in their saved order and replaces them; `RULE_DATA_KEY` names the data key that carries them on a rule being saved.
- `QuoteGiftStateInterface`: reads the amount spent towards each gift rule and the declined gift rules stored on a
  cart.

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

.PHONY: rector
rector:
	@echo "Checking with Rector";
	@vendor/bin/rector process src --dry-run

.PHONY: rector-fix
rector-fix:
	@echo "FIXING with Rector";
	@vendor/bin/rector process src

.PHONY: php-cs-fixer
php-cs-fixer:
	@echo "FIXING with PHP CS Fixer";
	@vendor/bin/phpcs

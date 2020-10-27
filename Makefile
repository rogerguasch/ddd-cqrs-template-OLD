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


.PHONY: install-deps
install-deps:
	@echo "Composer install..."
	@composer install

.PHONY: start-api
start-api:
	@php -S localhost:8090 apps/api/public/index.php

.PHONY: start-crm
start-crm:
	@php -S localhost:8091 apps/crm/public/index.php

.PHONY: clear-cache
clear-cache:
	@rm -rf apps/*/var
	@echo "Cleaning API cache..."
	@./apps/api/bin/console cache:warmup
	@echo "Cleaning CRM cache..."
	@./apps/crm/bin/console cache:warmup

.PHONY: start
start:
	@docker-compose up -d

.PHONY: restart
restart:
	@docker-compose restart


.PHONY: test
test:
	@echo "UNIT TESTING in SHARED folder..."
	 @php vendor/phpunit/phpunit/phpunit --bootstrap apps/bootstrap.php --configuration phpunit.xml tests/Shared --teamcity

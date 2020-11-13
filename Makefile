current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

#*********** QUALITY TOOLS ***********#
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

#*********** PROJECT ***********#
.PHONY: install-deps
install-deps:
	@echo "Composer install..."
	@composer install

#*********** CACHE ***********#
.PHONY: clear-cache
clear-cache: clear-crm-cache clear-api-cache

#*********** CACHE ***********#
.PHONY: clear-crm-cache
clear-crm-cache:
	@rm -rf apps/*/var
	@echo "Cleaning CRM cache..."
	@./apps/crm/bin/console cache:warmup

#*********** CACHE ***********#
.PHONY: clear-api-cache
clear-api-cache:
	@rm -rf apps/*/var
	@echo "Cleaning API cache..."
	@./apps/api/bin/console cache:warmup

#*********** DOCKER ***********#
.PHONY: start
start:
	@docker-compose up -d

.PHONY: restart
restart:
	@docker-compose restart

.PHONY: ps
ps:
	@docker-compose ps

.PHONY: down
down:
	@docker-compose down

#*********** TEST ***********#
.PHONY: test
test:
	@echo "UNIT TESTING in SHARED folder..."
	@php vendor/phpunit/phpunit/phpunit --bootstrap apps/bootstrap.php --configuration phpunit.xml tests/ --teamcity

.PHONY: test-with-coverage
test-with-coverage:
	@echo "Generating code coverage report..."
	@./vendor/bin/phpunit --coverage-html code_coverage_report


#*********** DATABASE ***********#
.PHONY: go_mysql
go_mysql:
	@echo "Going inside MySql..."
	@docker exec -it rgr_crm_mysql mysql --user=root --password=crm_psw

.PHONY: prepare-database
prepare-database:
	@echo "Creating the database..."
	@docker exec rgr_crm php apps/crm/bin/console doctrine:database:create
	@echo "Migrations..."
	@docker exec rgr_crm php apps/crm/bin/console doctrine:migrations:migrate

.PHONY: ping-mysql
ping-mysql:
	@docker exec rgr_crm_mysql mysqladmin --user=root --password=crm_psw --host "127.0.0.1" ping --silent

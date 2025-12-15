.PHONY: migrate reset build

migrate:
	php artisan migrate

reset:
	php artisan migrate:reset

build:
	php artisan migrate && php artisan serve &
	npm run dev

start:
	composer install
	php artisan migrate --force
	php artisan storage:link
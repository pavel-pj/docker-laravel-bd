first-up:
	sudo chmod -R 775 app/storage/   
	sudo chmod -R 775 app/bootstrap/cache/ 
	docker compose -f compose.dev.yaml up -d
	docker compose -f compose.dev.yaml exec -u root app composer install --optimize-autoloader --no-interaction --no-progress 
#docker compose -f compose.dev.yaml exec -u root app chown -R www:www /var/www/vendor 
#	docker compose -f compose.dev.yaml exec -u root app chmod -R 775 /var/www/vendor 
	docker compose -f compose.dev.yaml exec -u root app php artisan key:generate 
	docker compose -f compose.dev.yaml exec -u root app php artisan migrate 

bash:
	docker compose  -f compose.dev.yaml exec app bash
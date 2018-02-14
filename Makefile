migrate:
	mysql -u root -p < migrations/0-init.sql
	mysql -u root -p jello < migrations/1-tables.sql

dev:
	php -S localhost:8000 -t public/

start:
	sudo nginx -p $(shell pwd) -c nginx/nginx.conf

stop:
	sudo nginx -p $(shell pwd) -c nginx/nginx.conf -s stop

restart: stop start

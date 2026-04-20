#!/bin/bash

docker compose exec wordpress wp plugin activate advanced-custom-fields-pro --allow-root
docker compose exec wordpress wp plugin activate safe-svg --allow-root
docker compose exec wordpress wp theme activate carpathians --allow-root

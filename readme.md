docker exec -it php_container bash
php src/database/migrations/create_users_table.php
php src/database/migrations/create_user_profiles_table.php
php src/database/migrations/create_user_interests_table.php
php src/database/seeders/UserSeeder.php

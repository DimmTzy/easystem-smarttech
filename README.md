siapa pun yang mau menjalankan project harus jalankan dulu:
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

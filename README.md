cd C:\laragon\www <br>
git clone https://github.com/DimmTzy/easystem-smarttech.git <br>
cd easystem-smarttech <br>

siapa pun yang mau menjalankan project harus jalankan dulu: <br>
composer install <br>
cp .env.example .env <br>
php artisan key:generate <br>
php artisan migrate --seed <br>
php artisan storage:link <br>

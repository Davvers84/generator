Laravel Skeleton Generator\r\n\r\n

Used to create a simple structure for your component.\r\n\r\n

Usage: php artisan make:all {name : The common class name to be used in each part of the structure}\r\n\r\n

Example: php artisan make:all House\r\n\r\n

This will create the following laravel classes:\r\n\r\n

config/app.php (adds Service Provider)\r\n
app/Http/Controllers/HouseController.php\r\n
app/Models/House.php\r\n
app/Repositories/House/HouseRepository.php\r\n
app/Repositories/House/HouseRepositoryInterface.php\r\n
app/Services/HouseService.php\r\n
routes/api.php (create if not exists, otherwise appends)\r\n
routes/web.php (create if not exists, otherwise appends)\r\n

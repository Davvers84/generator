## Laravel Skeleton Generator

Used to create a simple structure for your component. 

Usage: 
_php artisan make:all {name : The common class name to be used in each part of the structure}_

## Example: php artisan make:all House

This will create the following laravel classes:

- config/app.php (adds Service Provider)
- app/Http/Controllers/HouseController.php
- app/Models/House.php
- app/Repositories/House/HouseRepository.php
- app/Repositories/House/HouseRepositoryInterface.php
- app/Services/HouseService.php
- routes/api.php (create if not exists, otherwise appends)
- routes/web.php (create if not exists, otherwise appends)

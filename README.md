Laravel Skeleton Generator<br/><br/>

Used to create a simple structure for your component.<br/><br/>

Usage: php artisan make:all {name : The common class name to be used in each part of the structure}<br/><br/>

Example: php artisan make:all House<br/><br/>

This will create the following laravel classes:<br/><br/>

config/app.php (adds Service Provider)<br/>
app/Http/Controllers/HouseController.php<br/>
app/Models/House.php<br/>
app/Repositories/House/HouseRepository.php<br/>
app/Repositories/House/HouseRepositoryInterface.php<br/>
app/Services/HouseService.php<br/>
routes/api.php (create if not exists, otherwise appends)<br/>
routes/web.php (create if not exists, otherwise appends)<br/>

Auto-updated

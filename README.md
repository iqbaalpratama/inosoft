## Installation
```
- git clone git@github.com:iqbaalpratama/inosoft.git
- cd inosoft
- cp .env.example .env
- change DB CONNECTION, PORT, DATABASE, and USERNAME according to you own database
- composer install
- php artisan migrate:fresh --seed
- php artisan key:generate
- php artisan serve 
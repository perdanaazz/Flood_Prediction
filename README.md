
## Installation

Software Needs
- Composer 2.3.7
- PHP 8.1.4 or latest
- Laragon / XAMPP as Localhost

After clone this project, open the terminal and run this command.

```bash
  composer install
  cp .env.example .env
  php artisan key:generate
  php artisan migrate
  php artisan migrate:fresh --seed
  php artisan serve
```

Open other terminal
```bash
  cd model
  python app.py
```

Administrator Login
```bash
  admin@gmail.com 123
``` 
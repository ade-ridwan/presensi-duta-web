# DUTA PRESENSI WEB

Sistem Absensi SMK DUTA

## Installation

Clone the project

```bash
  git clone https://github.com/ade-ridwan/presensi-duta-web.git
```

Go to the project directory

```bash
  cd starter-kit
```

Install dependencies Composer

```bash
  composer install
```

Install dependencies NPM

```bash
  npm install
```

## Local Configuration

Setting Enviroment (.env)

```bash
  cp .env.example .env
```

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=starter_kit
  DB_USERNAME=root
  DB_PASSWORD=
```

Migrate database and Seeder

```bash
  php artisan migrate:refresh db:seed
```

Start the server

```bash
  php artisan serve
```

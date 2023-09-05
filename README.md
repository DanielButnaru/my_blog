<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Ghid de Instalare pentru Proiectul My Blog

Acest ghid vă va ajuta să descărcați și să instalați proiectul My Blog pe PC-ul dvs. cu ajutorul Laravel. Asigurați-vă că aveți deja instalate Laravel, Composer și Node.js pe sistemul dvs.

## Pasul 1: Clonează repo-ul GitHub

Folosiți comanda `git clone` pentru a clona repo-ul My Blog de pe GitHub:

```shell
git clone https://github.com/DanielButnaru/my_blog
```

## Pasul 2: Intră în directorul proiectului

Navigați în directorul proiectului clonat cu comanda `cd`:

```shell
cd my_blog
```

## Pasul 3: Instalează dependințele PHP

Folosiți Composer pentru a instala toate dependințele PHP necesare proiectului:

```shell
composer install
```

## Pasul 4: Instalează dependințele JavaScript

Instalați dependințele JavaScript cu ajutorul npm:

```shell
npm install
```

## Pasul 5: Instalează Laravel UI (interfața Laravel)

Adăugați Laravel UI la proiect pentru a gestiona autentificarea și stilizarea:

```shell
composer require laravel/ui
```

## Pasul 6: Creează fișierul .env

Dacă nu există deja, creați un fișier `.env` în directorul principal al proiectului și copiați conținutul din `.env.example` în `.env`. Apoi, creati si înlocuiți numele bazei de date cu numele bazei dvs de date în fișierul `.env.`

## Pasul 7: Generează cheia de criptare

Folosiți comanda Laravel pentru a genera o cheie de criptare pentru aplicația dvs:

```shell
php artisan key:generate
```

## Pasul 8: Rulează migrările și semințele

Executați migrările și semințele pentru a inițializa baza de date:

    ```shell
    php artisan migrate --seed
    ```

## Pasul 9: Compilează resursele JavaScript și CSS

Compilează resursele JavaScript și CSS cu ajutorul npm:

```shell
npm run dev
```

## Pasul 10: Porniți serverul de dezvoltare Laravel

Într-un terminal nou, în directorul proiectului, porniți serverul de dezvoltare Laravel cu comanda:

    ```shell
    php artisan serve
    ```

<p align="center">
<h2 align="center">Schoolture</h2>
<p align="center"><small><i>embrio stage</i></small></p>
<br>
<p align="center"><a href="https://dawntale.id">Home</a></p>
</p>
<br>

### Table of contents

- [Server Requirements](#server-requirements)
- [Quick start](#quick-start)
- [Creators](#creators)
- [Copyright and license](#copyright-and-license)

### Server requirements

- PHP > 7.1.3
- MySQL or others

### Quick start

1. Install via CMD
 - Download the latest release and extract it
 - Rename .env.example to .env
 - Create database and insert your database name, user, and password to .env
 - Open CMD and run the following command
    - Install dependencies: `composser update`
    - Migrate database: `php artisan migrate`

2. Create Administrator Account using tinker
 - Open CMD and run the following command
    - `$php artisan tinker`
    - `$admin = new App\Administrator`
    - `$admin->name = "Your Name"`
    - `$admin->email = "Your Email"`
    - `$admin->password = Hash::make("Your Password")`
    - You can close tinker [CTRL + C]
 - Or you can go to `http://example.com/dashboard/register`
 - Done
 - Now, login.

### Creators

**Fajar Setya**

- <https://twitter.com/dawntale>
- <https://github.com/dawntale>
- <https://dawntale.id>

### Copyright and license

Code and documentation copyright 2018, [Dawntale.id](https://dawntale.id).
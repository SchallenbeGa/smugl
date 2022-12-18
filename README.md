<p align="center">
  <a href="https://example.com/">
    <img src="./resources/views/components/logo.svg" alt="Logo" width=72 height=72>
  </a>

  <h3 align="center">smugl</h3>

  <p align="center">
    Secure webshop
    <br>
    <a href="https://github.com/SchallenbeGa/smugl/issues/new">Report bug</a>
    <br>
    <a target="_blank" href="https://gabriel0.com">DEMO</a>
  </p>
</p>


## Table of contents

- [Quick start](#quick-start)
- [What's included](#whats-included) 
- [Bugs and feature requests](#bugs-and-feature-requests)
- [coffee](#coffee) 

## Quick start
 NEED LARAVEL 9.19 !

- composer install && npm install
- add the spicy to .env
- npm run dev
- php artisan serve

cron job : 
* key rotator to re-encrypt project with new key every hour
https://laravel.com/docs/9.x/encryption

incoming : 
* retrieve user info https://laravel.com/docs/9.x/requests (cloudfare db)
* check pgp key for server and client side after login (todo)
* exploit guard when laravel rotate (https://laravel.com/api/9.x/Illuminate/Auth/RequestGuard.html)

## What's included

* https://github.com/mewebstudio/captcha
* https://github.com/rawilk/laravel-app-key-rotator
* https://github.com/spatie/crypto (pgp check & communicate)
* https://github.com/spatie/laravel-permission

## Bugs and feature requests

Have a bug or a feature request? Please first search for existing and closed issues. If your problem or idea is not addressed yet, [please open a new issue](https://github.com/SchallenbeGa/smugl/issues/new).

## coffee

888tNkZrPN6JsEgekjMnABU4TBzc2Dt29EPAvkRxbANsAnjyPbb3iQ1YBRk1UXcdRsiKc9dhwMVgN5S9cQUiyoogDavup3H

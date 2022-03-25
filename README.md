<p align="center"><a href="https://stratebot.herokuapp.com" target="_blank"><img src="https://stratebot.herokuapp.com/stratebot.png" width="400"></a></p>

<p align="center">
<img src="https://img.shields.io/packagist/l/laravel/framework" alt="License" />
</p>


## About Stratebot

We want build an original strategy game application with Laravel, Tailwind css and Alpine.js.


## Status

Work in progress...
Todo:
- Log
- Template
- Lang
- Error page
- Bdd
- User
- connexion
- Leader board
- Menu
- Email
- Password
- User page
- Rules
- Versus
- Config
- Cards
- Bot
- Legals


## Application

The game is will be available on <a href='https://stratebot.herokuapp.com' target="_blank">Stratebot</a>


## Dev

Clone and configure .env file.

We use Laravel Sail and Mix (webpack). Use this command for start Docker and live Dev Preview.
```bash
sail up -d
sail npm run watch-poll
```

If you have an error with tinker, use this command for reload builder:
```bash
sail composer dump-autoload
```

For debug in blade view, you can use this elements:
```
{{ dd(session()->all()) }}
{{ dd(get_defined_vars()) }}
```


## Security Vulnerabilities

If you discover a security vulnerability within Stratebot, please send an e-mail to Bianchin Julien via [newrare@hotmail.com](mailto:newrare@hotmail.com). All security vulnerabilities will be promptly addressed.


## License

Stratebot is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


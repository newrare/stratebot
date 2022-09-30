<p align="center">
    <a href="https://stratebot.herokuapp.com" target="_blank">
        <img src="https://stratebot.herokuapp.com/stratebot.png" width="400" />
    </a>
</p>

<p align="center">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License" />
</p>


## About Stratebot

We want build an original strategy game application with Laravel, livewire, Tailwind css and Alpine.js.


## Status

Work in progress...
Todo:
- Update Card table (add image text (url), add protect json (array up down left right), remove 'move')

- Log system
- Template system
- Lang system
- Email system
- Chat system
- deploy with migration

- Menu (on template)

- Error page
- Press start page
- Blog page
- Connexion page
- Account page
- Navigation page
- Versus page
- Win page
- Loose page
- Ship page
- Player statistic page
- Leader board page
- Lost password page
- Rules page
- Versus page
- Player config page
- List of Cards page
- List of Bots page
- Legals page

- admin page
- admin create update Card
- admin create update Bot



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

Log file is default set:
```
storage/logs/laravel.log
```

You can use Tinker for SQL command (or Laravel command):
```
$tables = \DB::select('show tables');
$users = User::all();
```



## Command

You can use Laravel command with:
```
sail artisan
```
For example, you can create an alias in .bashrc (alias sailCommand='sail artisan').

And use this command for create many dev files (new Model, Test, Controller, etc):
```
sailCommand make:api Bot
```


For create or refresh migrations:
```
sailCommand migrate:refresh
```

And start all Unit tests (alias sailTest='sail artisan test'):
```
sailTest
```


For refresh route:
```
sailCommand route:clear
```



## Security Vulnerabilities

If you discover a security vulnerability within Stratebot, please send an e-mail to Bianchin Julien via [newrare@hotmail.com](mailto:newrare@hotmail.com). All security vulnerabilities will be promptly addressed.



## License

Stratebot is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

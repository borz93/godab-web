## Godab web source code

Código de la web Godab, usando Laravel Framework y varias librerías.
Cuenta con panel de administración.

### Instrucciones

Necesario PHP 7.0
Una vez clonado el repositorio, editar el archivo .env y hacer los siguientes comandos por consola:

    -composer update --no-scripts
    -composer dump-autoload
    -npm update
    -npm install -g gulp
    -gulp
    -php artisan key:generate
    -php artisan migrate
    -gulp

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

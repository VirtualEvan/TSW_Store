# TSW_Store

## Instalación

Para poder ejecutar utilizar cake se necesita:

HTTP Server. Por ejemplo: Apache. mod_rewrite habiliado.
```
httpd.conf

LoadModule rewrite_module modules/mod_rewrite.so  	
```
PHP 5.5.9 o superior (including PHP 7).

mbstring PHP extension

Eliminar ";" en el archivo de configuración php.ini
```
php.ini

extension=php_mbstring.dll 	
```

intl PHP extension

Eliminar ";" en el archivo de configuración php.ini
```
php.ini

extension=php_intl.dll
```

Tener instalado composer
<https://getcomposer.org/download/>


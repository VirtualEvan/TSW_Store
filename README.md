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

### Permisos
En Windows no debería haber problemas con los permisos, pero en sistemas Unix para que el sistema sea capaz de almacenar las imágenes de productos y usuarios, las carpetas donde se guardarán estas deberán tener permisos de escritura para el usuario del servidor web utilizado:
Estas carperas son /webroot/img/Products y /webroot/img/Users

Se pueden otorgar todos los permisos a estos directorios (No recomendado)
```bash
chmod 777 /webroot/img/Products
chmod 777 /webroot/img/Users
```
La solución anterior funcionaría correctamente, pero no es recomendada por cuestiones de seguridad

La solución recomendada sería dar solo permisos de escritura al usuario que debe escribir las imágenes (el usuario del servidor web)
Por ejemplo, para Apache sería www-data:

```bash
chmod 755 /webroot/img/Products
chmod 755 /webroot/img/Users
chown www-data:www-data /webroot/img/Products
chown www-data:www-data /webroot/img/Users
```

### Acceso
  Usuario   | Contraseña
----------  | ----------
virtualevan |   admin
 lrcortizo  |   admin
 prhermida  |   admin

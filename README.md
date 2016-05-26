Registro médico
==========

Aplicación web para el seguimiento de las historias clínicas

Como instalarlo
--------

Ejecuta los siguientes comandos para crear el fichero [parameters.yml](app/config/parameters.yml.dist), instalar las dependencias del proyecto (funcionan :100:% offline) y crear la base de datos y el usuario administrativo por defecto

```bash
cd "ruta/a/la/aplicacion"
php composer.phar install
php bin/console assets:install
```
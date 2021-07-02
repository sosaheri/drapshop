<p align="center"><a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre la aplicación

## Requisitos

- PHP >= 7.4
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Git

## Instalación

- crear virtual host para el proyecto con el nombre que hayan establecido
- ubicarse el la ruta root de virtual host
- realizar el clone del proyecto en git

```
https://github.com/sosaheri/drapshop.git

```

- ingresar a la carpeta de proyecto /drapshop 
- otorgar los permisos de escritura correspondientes al proyecto
```
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```
-instalar las depencias de composer
```
composer install
```
-llenar archivo de configuración de laravel datos de mysql, smtp etc. y guardar
```
cp .env.example .env
nano .env
```
-generar nuevo api-key de laravel
```
php artisan key:generate
```
-crear tablas y datos básicos del sistema, se deben ejecutar las migraciones de laravel
```
php artisan migrate --seed
```

## Forma Alternativa de probar API

Alternativamente, pueden dirigirse a las siguiente  URLS publicas y consultar los datos de la API

- Listar Personas GET (https://i-am-heri1.ml/api/people)
- Mostrar Persona especifica, debe sustituir id en url por el deseado GET (https://i-am-heri1.ml/api/people/id)
- Listar Productos GET (https://i-am-heri1.ml/api/products)
- Mostrar Producto especifico, debe sustituir id en url por el deseado GET (https://i-am-heri1.ml/api/products/id)

Para crear o actualizar datos requiere crear un token de autorizacion, se recomienda utilizar POSTMAN para este fin, se anexa copia de collection para su comodidad.

descague [POSTMAN Collection](https://www.getpostman.com/collections/fb4a56c96144b1960641)



## Licencia

Se hereda licencia de laravel [MIT license](https://opensource.org/licenses/MIT).



## Pasos

- clonar el repo https://github.com/iaw-2023/laravel-template y mantener como owner la organización de la materia.
## parados en el directorio del repositorio recientemente clonado, ejecutar:

- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan serve`

Con el último comando, pueden acceder a http://127.0.0.1:8000/ y ver la cáscara de la aplicación Laravel

### Requisitos

- tener [composer](https://getcomposer.org/) instalado
- tener [php](https://www.php.net/) instalado



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Proyecto Inicial

![Diagrama Entidad-Relacion](documentation/Diagrama%20E-R%20Proyecto.png)

*Observaciones:*

- Para calcular el verdadero precio de cada ítem según su tamaño, se mantiene en la entidad Detalle Ítem un multiplicador dependiente del tamaño el cual se multiplica por el precio para obtener el verdadero valor. En la entidad Ítem se mantiene el precio base (tamaño mediano) de cada ítem.

- Se almacena el path donde se guarda la imagen de cada ítem como atributo en ítem.

- Se utiliza un atributo id en la tabla Compone ya que no se permiten llaves primarias compuestas.

- Se podrán dar de baja ítems. Para esto se mantiene el atributo activo de tipo booleano en la tabla Ítem.


### ***Proyecto Framework PHP - Laravel***

- **¿Qué entidades se podrán actualizar?**\
Se podrán actualizar el precio y si están activos o no de los ítems, el estado del pedido y si están activos o no los tipos.

- **¿Qué reportes se podrán generar o visualizar?**\
Se podrán generar reportes de pedidos pendientes en general y pedidos filtrados por cliente.

- **¿Qué entidades se podrán obtener por API?**\
Las entidades que se podrán obtener por API son los pedidos, los ítems y los tipos.

- **¿Qué entidades se podrán modificar por API?**\
Las entidades que se podrán modificar por API son los pedidos y los clientes.



### ***Proyecto Javascript – React/Vue***

- **¿Qué información podrá ver el usuario?**\
El usuario podrá ver sus pedidos, los tipos de los ítems y los ítems que ofrece el local.

- **¿Qué acciones podrá realizar, ya sea la primera vez que ingrese a la aplicación como futuros accesos a la misma?**\
El usuario podrá registrarse como nuevo cliente, realizar un pedido, consultar los tipos de los ítems, consultar y seleccionar ítems de los que ofrece el local y consultar sus pedidos.

## Proyecto Framework PHP - Laravel

### API

Esta API proporciona endpoints para que los clientes puedan registrar una cuenta nueva la primera vez que ingresan, buscar items filtrados por tipo o sin filtrado y ver el detalle de cada item, realizar pedidos y cada cliente pueda consultar sus pedidos.


- **GET de items**

Este endpoint permite ver los items seleccionables.

*Parámetros*

| Parámetro | Tipo | Descripción |
| --------- | ---- | ----------- |
| - | - | No se requieren parámetros. |

*Respuestas*

| Código de respuesta | Descripción |
| ------------------- | ----------- |
| 200 | Se devuelve la lista de items correctamente. |


- **GET de items/{id}**

Este endpoint permite ver el detalle de un item.

*Parámetros*

| Parámetro | Tipo | Descripción |
| --------- | ---- | ----------- |
| id  | integer | ID del item. |

*Respuestas*

| Código de respuesta | Descripción |
| ------------------- | ----------- |
| 200 | Se devuelve el detalle del item. |
| 404 | No se encontró el item con el ID especificado. |


- **GET de tipos**

Este endpoint permite ver todos los tipos disponibles.

*Parámetros*
| Parámetro | Tipo | Descripción |
| --------- | ---- | ----------- |
| -  | - | No se necesitan parámetros. |

*Respuestas*

| Código de respuesta | Descripción |
| ------------------- | ----------- |
| 200 | Lista de tipos obtenida correctamente. |


- **GET de tipos/{id}**

Este endpoint permite obtener los items de un determinado tipo.

*Parámetros*

| Parámetro | Tipo | Descripción |
| --------- | ---- | ----------- |
| id  | string | ID del tipo. |

*Respuestas*

| Código de respuesta | Descripción |
| ------------------- | ----------- |
| 200 | Lista de items por tipo obtenida correctamente. |
| 404 | Tipo no encontrado. |


- **POST de pedidos**

Este endpoint permite crear un nuevo pedido.

*Respuestas*

| Código de respuesta | Descripción |
| --------- | ----------- |
| 201 | Pedido realizado correctamente. |
| 422 | Error de validación. |


- **GET de clientes/{idCliente}/pedidos**

Este endpoint permite a un cliente ver sus pedidos.

*Parámetros*

| Parámetro | Tipo | Descripción |
| --------- | ---- | ----------- |
| idCliente  | integer | ID del cliente. |

*Respuestas*

| Código de respuesta | Descripción |
| ------------------- | ----------- |
| 200 | Se devuelven los pedidos del cliente. |
| 404 | No se encontró el cliente con el ID especificado. |


- **POST de clientes**

Este endpoint permite al cliente registrarse.

*Respuestas*

| Código de respuesta | Descripción |
| --------- | ----------- |
| 201 | Cliente registrado de forma exitosa. |
| 422 | Error de validación. |


## ***Promoción***

### ***Autenticación de usuarios***
Autenticamos los usuarios utilizando Sanctum, más precisamente utilizando *API TOKEN*. Protegimos las rutas que requieren autenticación con *'auth:sanctum'* lo que se asegura que el usuario que intente acceder al endpoint es efectivamente un usuario autenticable con un token válido. Añadimos las funciones login, logout y register a APIClienteController, también se separó la autenticación de entrada para un pedido del almacenamiento de un pedido debido a cuestiones de flujo de los eventos (chequear datos correctos previo a realizar transacción de Mercado Pago).

### ***Roles en Laravel***
Creado el rol editor en adición al rol de admin. El mismo tiene la capacidad de realizar las mismas acciones que el admin a excepción de Crear y Eliminar Items y Tipos.
Se usaron políticas de autenticación de Laravel para realizar el control de rol del usuario autenticado. Se agregaron los respectivos controles a las rutas web de Laravel usando las políticas definidas y el middleware de Laravel "can". Se definió como invisible el botón para la Creación y el botón para Eliminar de forma lógica se definió como deshabilitado si el rol es editor, debido a que si se lo definía invisible la columna de acciones en la tabla de Tipos quedaba vacía.

### ***MercadoPago***
Utilizado controlador de Mercado Pago para el procesamiento de transacciones y agregada ruta al archivo de rutas de API como una ruta autenticada. Instaladas las dependencias de Mercado Pago para poder hacer uso del mismo.

### Links

- **[Deploy Vercel](https://digital-dynamos-laravel.vercel.app/)**
- **[Swagger UI](https://digital-dynamos-laravel.vercel.app/rest/documentation)**
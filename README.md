 CRUD de Productos con Laravel 10

Este proyecto es una aplicación web sencilla que permite gestionar productos (crear, listar, editar, eliminar) utilizando:

- Laravel 10
- Bootstrap 5
- PHP
- MySQL

 Características

✅ Validaciones personalizadas  
✅ Alertas Bootstrap (éxito y errores)  
✅ Conexión a base de datos MySQL  
✅ Diseño limpio y responsive  

 Cómo ejecutar

```bash
git clone https://github.com/valecita14/crud_laravel.git
cd crud_laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

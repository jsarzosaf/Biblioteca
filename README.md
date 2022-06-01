

## Instalación y configuración de base de datos

Para poder instalar el proyecto se debe ejecutar el siguiente comando git 
en su servidor web local

https://github.com/jsarzosaf/Biblioteca.git

Considerar que el repositorio es público.

Como siguiente paso se debe configurar el archivo .env, donde se toma como referencia
el archivo .env.example, donde lo único que se debe agregar diferente son las conexiones
de la gestor de base de datos y su respectivo nombre de la base de datos que se van
ejecutar las migraciones.

Ya configurado el archivo .env, se ejecuta el comando composer install, para que instale 
todas las dependencias del proyecto.

Siguiente paso será ejecutar las migraciones y seeder siguiendo la secuencia de comandos
descritos acontinuación:

php artisan migrate:install
php artisan migrate:status
php artisan migrate
php artisan db:seed --class=EtiquetasSeeder
php artisan db:seed --class=LibroSeeder

Ya ejecutados estos comandos ya tenemos la base de datos configurado con datos mínimos
para poder probar los endpoints.

Para proceder realizar las pruebas se debe levantar la aplicación con el siguiente 
comando

php artisan serve

Por defecto si no se especifica una dirección específica o puerto esta será la url
de referencia para probar los endpoints: (http://127.0.0.1:8000)

## Pruebas de endpoints

### Ruta para listar los libros activos de la biblioteca (GET)

Route::get('listar_libros/{etiqueta?}/{value?}', [BibliotecaController::class, 'getLibros']);
  
Si se le proporciona el parametro opcional etiqueta y value se indica que se hara una busqueda por etiquetas ambos se deben especificar para que de una busqueda exitosa. 

 http://127.0.0.1:8000/api/listar_libros/Autor/rowling

Sino se indica ninguno de los parametros opcionales se retornara todos los libros disponibles.

 http://127.0.0.1:8000/api/listar_libros


### Ruta para poder prestar un libro(POST)

Route::post('prestar_libro', [BibliotecaController::class, 'registerPrestamo']);

Donde se debe especificar los siguiente parametros el identificador del libro (libro_id), la fecha de entrega que devolvera el libro, y el nombre del usuario que registra solicitud y el nombre del usuario solicitante

http://127.0.0.1:8000/api/prestar_libro

Ejemplo de payload entrada:

{
    "id_libro": 1,
    "user_prestamo": "Jose",
    "user_solicitud": "Camilo",
    "fecha_entrega": "2022-06-15"
}

### Ruta para dar de altas libros en el sistema de la biblioteca(POST)

Route::post('dar_alta_libro', [BibliotecaController::class, 'addStockLibro']);

Se debe especificar el identificador del libro (libro_id), la cantidad de ejemplares de dar de alta, y el motivo de la alta que puede ser (migracion, donacion, compra, daño)

http://127.0.0.1:8000/api/dar_alta_libro

Ejemplo de payload entrada:

{
    "id_libro": 1,
    "cantidad_ejemplares": 5,
    "motivo": "donacion"
}


sudo chown -R user:www-data Fetch_App/
sudo chmod -R 775 Fetch_App/

php artisan make:migration create_trainers_table
php artisan make:migration create_pokemon_table

php artisan migrate

php artisan make:model Trainer
php artisan make:model Pokemon

php artisan make:controller TrainerController --resource
php artisan make:controller PokemonController --resource

Los Form Requests son clases dedicadas a la validación de datos que permiten mover la lógica de validación fuera de los controladores. Esto hace que el código sea más limpio y mantenible.
Sirven para:
- Separación de responsabilidades: Permiten mover la lógica de validación fuera de los controladores.
- Reutilización: Las reglas de validación pueden reutilizarse en diferentes partes de la aplicación.
- Autorización: Incluyen un método authorize() que permite definir si el usuario tiene permiso para realizar la acción.
- Mensajes personalizados: Permiten definir mensajes de error específicos para cada regla de validación.
- Validación compleja: Pueden contener lógica de validación más compleja y personalizada.
En este caso se ha simplificado la validación en los controladores de la siguiente forma:
- Se ha eliminado la validación manual con $request->validate()
- Se usa $request->validated() que devuelve los datos ya validados
php artisan make:request StoreTrainerRequest
php artisan make:request UpdateTrainerRequest
php artisan make:request StorePokemonRequest
php artisan make:request UpdatePokemonRequest

Se crean las rutas y se verifican con `php artisan route:list`

Las rutas de recursos `Route::resource()` contienen todos los tipos de peticiones (GET, POST, PUT y DELETE).

## El script con fetch
Se crea el script con una estructura modular para mantener el código limpio y reutilizable.

El archivo principal está en *public/assets/js/app.js*  
La clase PokemonManager está en *public/assets/js/modules/PokemonManager.js*
Los ficheros de configuración en *public/assets/js/config/* con los nombres *pokemon-types.js* y *regions.js*.

Se incluyen los scrips en el layout principal app.blade.php al final del `<body>`:
```
<script type="module" src="{{ asset('assets/js/app.js') }}"></script>
```
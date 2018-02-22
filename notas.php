_______CREACION DE Modelo producto con migracion y controlador a la vez__________
php artisan make:model Product -mc

_______CREar seeder________
php artisan make:seeder ProductsTableSeeder

___________******create_products_table.php________
*1 campo que se creara en la base de datos, tipo string y el nombre es name
*2 campo que se creara en la base de datos, tipo mediumtext y el nombre es short
*3 campo que se creara en la base de datos, tipo text y el nombre es body

_______DatabaseSeeder.php_________
*1 esta linea se encuentra originalmente comentada, la descomentamos y modificamos el nombre por ProductsTableSeeder
*1 cuando vayamos a ejecutar el comando para crear las bases de datos se va a a ejecutar esta linea y de alli se llamara a la clase ProductsTableSeeder en el archivo ProductsTableSeeder.php

_______________ProductsTableSeeder.php___________
*1 App es el namespace configurado preteterminadamente para el modelo Product. este namespace se puede cambiar ejecutando php artisan app:name Rimorsoft
*1 Llamamos al modelo Product para poderlo usar.
*2 al ejecutar esta funcion, por ser factory va a buscar los datos en el archivo database/factories/ModelFactory.php para crear los datos semilla a partir de los campos que le damos

___________factories/ModelFactory.php__________
*1 genera una oracion de 2 palabras
*2 texto de 140 caracteres
*3 text de 900 caracteres

__________Product.php__________
*1 estos campos identifican aquellos que existen en la base de datos y es capaz de comparar con las cajas de texto y determina si deben estar llenas o vacias a la hora de guardar en la base de datos, de esta forma nos aseguramos de que se envien a la base de datos solo losdatos que tenemos permitidos y de esta manera no nos hagan una inyeccion que no corresponda a estos campos

_____________app/providers/serviceprovider.php_______
*1 usamos esta libreria para poder crear colocar el tamaño predeterminado para los campos de la base de datos
*2 longitud maxima que llevaran por defecto los campos de String al migrar las bases de datos. cantidad maxima 191


_________.env__________
DB_DATABASE=crud
DB_USERNAME=root
DB_PASSWORD=
-crear base de datos crud en phpmyadmin

-php artisan migrate:refresh --seed  migramos la base de datos y plantamos los seeders

______routes/web.php_______
 *1 ruta de tipo resource para crear el crud completo del modulo productos, el primer parametro es el nombre de la ruta, el segundo parametro es el COntrolador que definira que hacer en cada caso, para mirar el nombre de las distintas rutas generadas ejecutar:
 - php artisan route:list  muestra las rutas creadas actualmente
 
 _____productController.php_______________
 *1 metodo index, se activa con la ruta products

 
 _________________MODULO PRODUCTS__________________
-crear views/products/index.blade.php
-crear views/layout.blade.php

___________________layout.blade.php___________________
-creamos la plantilla base
*1 *2 importamos las lineas de bootstrap
*3 javascript de bootstrap, debemos traer a jquery para que este funcione *4
*5Espacio editable

______________________index.blade.php_______________________
*1 se hace herencia desde la plantilla anterior layout.blade.php
*2 section indica en que parte se va a insertar esta información, en este caso se insertara en el yield "content" de la vista layout
*3 boton nuevo apuntando a la ruta de creacion de productos

 _____productController.php_______________
 *2 retorna la vista index
 *3 invocamos al modelo Product para usarlo
 *4 creamos la variable products, llamamos al modelo y le pedimos que traiga todo de la base de datos organizado por id y de forma descendente y paginado
 *5 pasamos a la vista el arreglo con todos los productos que se encuentras almacenados en la variable products

______________________index.blade.php_______________________
*4 con un foreach de laravel llamamos a la variable $products que se creo en el ProductController y contiene la consulta a la base de datos con todos los productos, 
*5 por cada ciclo del foreach se llenan estas columnas con el campo id y el name del elemento actual
*6 genera los botones de paginacion

__________ProductController.php_______
-Configurar metodo para show, el nombre que debe llevar el metodo lo encontramos en routes:list en la seccion de "action" despues del @
-*6 metodo show con el parametro id
-*7 llamamos al modelo producto y le pedimos que busque por medio del id
-*8 devolvemos la ruta para mostrar resultados y mandamos el resultado de la consulta en la variable product que es la variable de la linea anterior *7

__________show.blade.php_____
*3 llamamos a la variable product y le pedimos el campo
*4 cuando necesitamos que las etiquetas html se interpreten usamos {!!!!}
*5 boton con ruta y parametro para redirigir a la vista editar del producto actual

______________________index.blade.php_______________________
*7 se llama la ruta products.show y se manda como segundo parametro el id contenido en la variable product
*8 se llama la ruta products.edit y se manda como segundo parametro el id contenido en la variable product

__________ProductController.php_______
*9 Se almacena en la variable product el el product que se busca con el id
*10  se ejecuta la funcion delete en esa variable.
*11CtrllProduct se devuelve a la pagina anterior con un mensaje, '..' concatena el valor de product en el string

______________________index.blade.php______________________
*9 para eliminar no se usa url (metodo get) debido a que es inseguro, entonces se usa un formulario con el metodo POST
*11 el metodo delete que se muestra en el route:list en realidad no existe en html, pero lo que se hace es simular que existe
*10 crea un campo oculto con el nombre de _token con una serie encriptada que garantiza que el elemento sea eliminado atravez de la aplicación y no externamente


_____________________products/fragment/info.blade.php___________________________
//

*1rvpfinfo si existe una variable de session llamada info 
*2rvpfinfo boton con la accion de data-dismiss='alert' que le da la orden a bootstrap por medio de javascript para que oculte las etiquetas funcionando bajo la clase bootstrap "alert" 
*3rvpfinfo esto me trae el contenido de la variable info, en el caso de ProductController.php en el metodo destroy (*11) devuelve un mensaje que se almacena en esta variable "info". 
*4rvpfinfo
*5rvpfinfo mensaje de alerta bootstrap
*3rvpfinfo imprime el contenido de la variable de Session "info"
-incluimos este archivo en la vista index.blade.php


_____________________products/fragment/aside.blade.php___________________________
este archivo pondra la informació nde ayuda
*1rvpfaside este mensaje alert debe incluirse en la vista index *11rvpindex
__________________________________________________________________________________

-instalar laravelcollective en el proyecto
https://laravelcollective.com/docs/5.3/html
-  composer require "laravelcollective/html":"^5.3.0"

-crear vistas editar y crear a partir de la plantilla show


______________________edit.blade.php___________________________________
*1rvpedit este boton lleva a la vista index
_______________________________________________________________
-Crear vista crear

____________________ProductController.php___________________

*12CtrllProduct crear metodo edit en el controlador 
*13CtrllProduct las vistas se llaman igual que el metodo, eso es un estandar.
*14CtrllProduct Creamos el metodo create
*15CtrllProduct no lleva parametro porque apenas vamos a crear el poducto

_____________________________________________
-CONFIGURAR LARAVEL COLLECTIVE
-IR A https://laravelcollective.com/docs/5.3/html
Y COPIAR ESTA LINEA: Collective\Html\HtmlServiceProvider::class,

______________config/app.php_____________________________
*1 AGREGAR LINEA Collective\Html\HtmlServiceProvider::class, en Application Service Providers...
*2 agregar estos alliases en la section de alliases
	  'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,

____________________fragment/form.blade.php_______________________
*1rvpfform esto imprimira por medio de interpretacion de laravel y a traves de laravelcollectice una etiqueta asi: 
<label for="name">Nombre del producto</label>

*2rvpfform el atributo "null" va alli porque sera llenado de forma dinamica en este caso alli ira un nombre
<input class="form-control" name="name" type="text" value="Et velit facilis." id="name">
*7rvpfform
<input class="btn btn-primary" type="submit" value="ENVIAR">

__________________edit.blade.php______________________
*2rvpedit cuando necesitamos que las etiquetas html se interpreten usamos {!!!!}
*2rvpedit model([variable,[ruta],metodo]) la variable $product es la que proviene de productcontroller en el metodo edit
en el segundo parametro hacemos llamado a la ruta products.update que podemos verificar en route:list y le pasamos como pramaetro el id de la variable producto porque asi lo requiere la ruta, por ultimo parametro de model especificamos el metodo que es Put
*3rvpedit importamos el formulario

______________________create.blade.php___________________________
*1rvpcreate: Form:open([ruta,metodo Post]) , como el metodo por default es Post entonces dejamos ese parametro en blanco

_______________2018_02_03_093005_create_products_table_____________
*4DMCREATE_PRODUCTS: para hacer que este campo NO sea obligatorio se le a grega la propiedad nullable() asi:
 $table->string('name')->nullable();

<?php


//00 Saber si un usuario o producto tirnr o no una imagen
$usuario = App\User::find(1);

$image = $usuario->image;

if ($image){
    echo 'Tiene una imagen';
}else{
    echo 'No tiene imagen';
}
    return $image;


// 01 Crear una imagen para un usuario utlizando el metodo save
$imagen = new App\Image(['url'=>'imagenes/avatar.png']);

$usuario = App\User::find(1);

$usuario->image()->save($imagen);


    return $usuario;


// 02 Obtener informacion de las imagenes a traves del usuario

$usuario = App\User::find(1);
return $usuario->image->url;


// 03 Crear varias imagenes para un producto utlizando el metodo savemany

$producto = App\Product::find(1);

$producto->images()->saveMany([
    new App\Image(['url'=>'imagenes/avatar.png']),
    new App\Image(['url'=>'imagenes/avatar2.png']),
    new App\Image(['url'=>'imagenes/avatar3.png']),
]);

return $producto->images;



// 04 Crear una imagen para un usuario utlizando el metodo create

$usuario = App\User::find(1);

$usuario->image()->create([
    'url' => 'imagenes/avatar2.png'
]);


    return $usuario;



// 04.1 Otra forma seria así
$imagen = [];

$imagen ['url'] = 'imagenes/avatar3.png';

$usuario = App\User::find(1);

$usuario->image()->create( $imagen);


    return $usuario;


//05 Crear varias imagenes para un producto utilizando el metodo createMany

$imagen = [];

$imagen[]['url'] = 'imagenes/avatar.png';
$imagen[]['url'] = 'imagenes/avatar2.png';
$imagen[]['url'] = 'imagenes/avatar3.png';
$imagen[]['url'] = 'imagenes/a.png';
$imagen[]['url'] = 'imagenes/a.png';
$imagen[]['url'] = 'imagenes/a.png';

$producto = App\Product::find(2);

$producto->images()->createMany($imagen);

return $producto->images;


//06 Actualizar la imagen del usuario
$usuario = App\User::find(1);

$usuario->image->url='imagenes/avatar2.png';

$usuario->push();

return $usuario->image;


//07 Actualizar una imagen de los productos
$producto = App\Product::find(1);

$producto->images[0]->url= 'imagenes/a.png';
$producto->push();

return $producto->images;

//08 Buscar el registro relacionado a la imagen
$image = App\Image::find(9);

    return $image->imageable;


//09 Delimitar los registros
$producto = App\Product::find(2);

return $producto->images()->where('url','imagenes/a.png')->get();


//10 Odenar registros que provienen de la relacion
$producto = App\Product::find(2);

return $producto->images()->where('url','imagenes/a.png')->orderBy('id','Desc')->get();
    

//11 Contar los registros relacionados al usuario
    
$usuario = App\User::withCount('image')->get();
$usuario = $usuario->find(1);
return $usuario->image_count;


//12 Contar los registros relacionados a los productos
    
$productos = App\Product::withCount('images')->get();
$productos = $productos->find(1);
return $productos->images_count;


//13 Contar los registros relacionados
    
$productos = App\Product::find(2);
return $productos->loadCount('images');


//14 lazy loading Carga diferida

$producto = App\Product::find(2);

$imagen = $producto->image;

$categoria = $producto->category;



//15 Carga previa (eager loading) de ususarios
    
$usuario = App\User::with('image')->get();

return $usuario;


//16 Carga previa (eager loading) de productos

$producto = App\Product::with('images')->get();

return $producto;


//17 Carga previa (eager loading) de usuario especifico
    
$usuario = App\User::with('image')->find(1);

return $usuario->image->url;



//18 Carga previa (eager loading) de multiples relaciones
    
$producto = App\Product::with('images','category')->get();

return $producto;


//19 Carga previa (eager loading) de multiples relaciones de un producto especifico
    
$producto = App\Product::with('images','category')->find(1);

return $producto;


//20 Delimitar los campos
    
$producto = App\Product::with('images:id,imageable_id,url','category:id,nombre')->find(1);

return $producto;



//21 Eliminar una imagen de un producto
    
$producto = App\Product::find(1);

$producto->images[0]->delete();

return $producto;



//22 Eliminar todas las imagenes de un producto
    
$producto = App\Product::find(2);

$producto->images()->delete();

return $producto;







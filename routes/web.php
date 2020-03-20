<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Product;
use App\Category;
use App\Image;

// Para hacer pruebas con imagenes
Route::get('/prueba', function () {

//21 Eliminar una imagen
    
    $producto = App\Product::with('images','category')->orderBy('id', 'Desc')->get();
    
    return $producto;

});

// mostrar resultados
Route::get('/resultados', function () {

    $image = App\Image::orderBy('id','Desc')->get();
    return $image;
});



Route::get('/', function () {

    /*$prod = Product::findOrFail(1);

    $prod->slug = 'producto-3';

    $prod->save();

    return $prod;*/
    
    //$prod = new Product();
    
   /* $prod->nombre = 'Producto 3';
    $prod->slug = 'Producto 3';
    $prod->category_id = 1;
    $prod->descripcion_corta = 'Producto';
    $prod->descripcion_larga = 'Producto';
    $prod->especificaciones = 'Producto';
    $prod->datos_de_interes = 'Producto';
    $prod->estado = 'Nuevo';
    $prod->activo = 'Si';
    $prod->sliderprincipal = 'Si';
    $prod->save();
        return $prod;*/
        

    // return view('welcome');

    // $prod = Product::find(2)->category;
    // return $prod;

    // $cat = Category::find(2);
    // return $cat;

   /* $cat = Category::find(1)->products;
    return $cat;
    */
    return view('tienda.index');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('plantilla.admin');
})->name('admin');

Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');

Route::resource('admin/product','Admin\AdminProductController')->names('admin.product');

Route::get('cancelar/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar','Acción cancelada..!!');
})->name('cancelar');
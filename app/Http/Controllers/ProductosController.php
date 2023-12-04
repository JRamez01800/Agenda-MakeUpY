<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use DB;
class ProductosController extends Controller
{
    public function topSell(){
        $productos = Producto::select(
            'productos.IdProducto',
            'productos.Nombre',
            'productos.Marca',
            'productos.Descripcion',
            'productos.Imagen',
            DB::raw('SUM(carrito.Cantidad) as TotalVentas')
        )
        ->leftJoin('carrito', 'productos.IdProducto', '=', 'carrito.IdProducto')
        ->where('carrito.Estado', 'Pagado')
        ->groupBy('productos.IdProducto')
        ->orderBy('TotalVentas', 'DESC')
        ->get();
    
        // Devolver los datos en formato JSON
        return response()->json($productos);
    }

    public function lowSell(){
        $productos = Producto::select(
            'productos.IdProducto',
            'productos.Nombre',
            'productos.Marca',
            'productos.Descripcion',
            'productos.Imagen',
            DB::raw('SUM(carrito.Cantidad) as TotalVentas')
        )
        ->leftJoin('carrito', 'productos.IdProducto', '=', 'carrito.IdProducto')
        ->where('carrito.Estado', 'Pagado')
        ->groupBy('productos.IdProducto')
        ->orderBy('TotalVentas', 'DESC')
        ->get();
    
        return response()->json($productos);
    }

    public function getCatalog()
    {
        $productos = Producto::select('IdProducto', 'Nombre', 'Precio', 'Marca', 'Imagen')->get();

        return response()->json($productos);
    }

}

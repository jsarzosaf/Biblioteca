<?php

namespace App\Http\Controllers;

use App\Models\AltaBaja;
use App\Models\Libro;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLibros($etiqueta = '', $value = '')
    {
        /**
         * Se valida que venga por parametros de entrada 
         * el filtro a aplicar que son las etiquetas disponibles,
         * se hace un query con join hasta la tabla etiqueta 
         */
        if(!empty($etiqueta) and !empty($value)){

            $libros = DB::table('libro')
            ->join('libro_caracteristica', 'libro.id_libro', '=', 'libro_caracteristica.id_libro')
            ->join('etiquetas', 'libro_caracteristica.id_etiqueta', '=', 'etiquetas.id_etiqueta')
            ->where('libro_caracteristica.valor', 'like', '%'.$value.'%')
            ->where('etiquetas.descripcion',  $etiqueta)
            ->where('libro.estado', 'Activo')
            ->select('libro.*')
            ->get();

            return $libros;
        }

        /**
         * Si no se le indica un filtro se devuelve todos los libros activos
         */
        return Libro::where('estado','Activo')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerPrestamo(Request $request)
    {
        $data = $request->all();
        
        /**
         * Se le asigna automaticamente estas fechas
         * que son la fecha de hoy por defecto
         */
        $data['fecha_solicitud'] = date('Y-m-d');
        $data['fecha_asignacion'] = date('Y-m-d');

        $registroPrestamo = Registro::create($data);

        return response()->json($registroPrestamo,200);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStockLibro(Request $request)
    {
        $data = $request->all();
        
        /**
         * Se le asigna automaticamente el tipo de ingreso 
         * al sistema de la biblioteca
         */
        $data['tipo'] = 'ingreso';
       
        $Libro = Libro::find($data['id_libro']);
        $Libro->addStock($data['cantidad_ejemplares']);
        
        $altaBaja = AltaBaja::create($data);

        return response()->json($altaBaja,200);
    }


}

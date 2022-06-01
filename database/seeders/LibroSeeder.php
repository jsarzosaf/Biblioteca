<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use App\Models\Libro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroSeeder extends Seeder
{
    protected $data = [
       [
           'titulo' => 'Señor de los anillos',
           'autor' => 'Tolkien',
           'ejemplares' => 8,
           'tematica' => 'Fantasia'
       ],
       [
        'titulo' => 'Harry Potter',
        'autor' => 'J. K. Rowling',
        'ejemplares' => 5,
        'tematica' => 'magia'
    ],
    [
        'titulo' => 'Spiderman',
        'autor' => 'Stan Lee',
        'ejemplares' => 2,
        'tematica' => 'Superheroe'
    ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etiquetaAutor = Etiqueta::where('descripcion', 'Autor')->first();
        $etiquetaTematicas = Etiqueta::where('descripcion', 'Tematicas')->first();
       
        foreach($this->data as $infoLibro){
            
               $libro = Libro::create(
                    [
                        'ISBN' =>123456,
                        'titulo' =>$infoLibro['titulo'],
                        'subtitulo' =>'subtitulo...',
                        'estado' =>'Activo',
                        'version' => 1,
                        'numero_ejemplares' =>$infoLibro['ejemplares'],
                        'fecha_elaborado' =>date('Y-m-d'),
                    ]
                );

               

                DB::table('libro_caracteristica')->insert([
                    'id_libro' => $libro->id_libro,
                    'id_etiqueta' => $etiquetaAutor->id_etiqueta,
                    'valor' => $infoLibro['autor']
                ]);

                DB::table('libro_caracteristica')->insert([
                    'id_libro' => $libro->id_libro,
                    'id_etiqueta' => $etiquetaTematicas->id_etiqueta,
                    'valor' => $infoLibro['tematica']
                ]);
            
        }
    }
}

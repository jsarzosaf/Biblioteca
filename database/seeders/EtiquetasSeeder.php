<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use Illuminate\Database\Seeder;

class EtiquetasSeeder extends Seeder
{
    protected $data = [
        'Autor', 'Editorial', 'Tematicas', 'Contenidos', 'Personajes'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->data as $type){
            
                Etiqueta::create(
                    [
                        'descripcion' =>$type
                    ]
                );
            
        }
    }
}

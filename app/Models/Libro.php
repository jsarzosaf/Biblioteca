<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

      /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_libro';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'libro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ISBN', 
        'titulo',
        'subtilulo',
        'estado', 
        'version',
        'numero_ejemplares',
        'fecha_elaborado'
    ];

    /**
     * Metodo para poder agregar ejemplares 
     * de un libro dentro de la biblioteca
     */
    public function addStock($cantidadEjemplares)
    {
        $this->numero_ejemplares += $cantidadEjemplares;
        $this->save();
    }

    /**
     * Metodo para poder disminuir ejemplares 
     * de un libro dentro de la biblioteca
     */
    public function removeStock($cantidadEjemplares)
    {
        $this->numero_ejemplares -= $cantidadEjemplares;
        $this->save();
    }
}

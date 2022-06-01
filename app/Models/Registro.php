<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
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
    protected $primaryKey = 'id_registro';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'registro_asignacion';
}

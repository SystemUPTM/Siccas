<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $pregunta
 */
class NPreguntaRecuperacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'n_pregunta_recuperacion';

    /**
     * @var array
     */
    protected $fillable = ['pregunta'];
    
    public $timestamps = false;

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 */
class NTipoTrimestre extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'n_tipo_trimestre';

    /**
     * @var array
     */
    protected $fillable = ['id', 'nombre'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $n_tipo_nacionalidad
 * @property string $nombre
 * @property string $apellido
 * @property int $cedula
 * @property string $direccion
 * @property NTipoNacionalidad $nTipoNacionalidad
 * @property Inscripcion[] $inscripcions
 */
class Solicitante extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'solicitante';

    /**
     * @var array
     */
    protected $fillable = ['n_tipo_nacionalidad', 'nombre', 'apellido', 'cedula', 'direccion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nTipoNacionalidad()
    {
        return $this->belongsTo('App\NTipoNacionalidad', 'n_tipo_nacionalidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcions()
    {
        return $this->hasMany('App\Inscripcion', 'id_solicitante');
    }
}

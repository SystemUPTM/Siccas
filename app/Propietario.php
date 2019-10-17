<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $n_tipo_nacionalidad
 * @property int $n_tipo_rif
 * @property string $nombre
 * @property string $apellido
 * @property int $cedula
 * @property string $rif
 * @property int $rif_numero
 * @property string $direccion
 * @property NTipoNacionalidad $nTipoNacionalidad
 * @property NTipoRif $nTipoRif
 * @property ImpuestoInmobiliario[] $impuestoInmobiliarios
 * @property Inscripcion[] $inscripcions
 */
class Propietario extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'propietario';

    /**
     * @var array
     */
    protected $fillable = ['n_tipo_nacionalidad', 'n_tipo_rif', 'nombre', 'apellido', 'cedula', 'genero', 'vivienda','rif', 'rif_numero', 'direccion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nTipoNacionalidad()
    {
        return $this->belongsTo('App\NTipoNacionalidad', 'n_tipo_nacionalidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nTipoRif()
    {
        return $this->belongsTo('App\NTipoRif', 'n_tipo_rif');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function impuestoInmobiliarios()
    {
        return $this->hasMany('App\ImpuestoInmobiliario', 'id_propietario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcions()
    {
        return $this->hasMany('App\Inscripcion', 'id_propietario');
    }
}

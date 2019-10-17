<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_propietario
 * @property int $id_documento
 * @property int $id_linderos
 * @property int $id_inmueble
 * @property int $id_solicitante
 * @property string $ni
 * @property string $fecha
 * @property string $sector
 * @property Propietario $propietario
 * @property Documento $documento
 * @property Lindero $lindero
 * @property Inmueble $inmueble
 * @property Solicitante $solicitante
 */
class Inscripcion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inscripcion';
    protected $timestamp = false;

    /**
     * @var array
     */
    protected $fillable = ['id_propietario', 'id_documento', 'id_linderos', 'id_inmueble', 'id_solicitante', 'ni', 'fecha', 'sector'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propietario()
    {
        return $this->belongsTo('App\Propietario', 'id_propietario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documento()
    {
        return $this->belongsTo('App\Documento', 'id_documento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function linderos()
    {
        return $this->belongsTo('App\Linderos', 'id_linderos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inmueble()
    {
        return $this->belongsTo('App\Inmueble', 'id_inmueble');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitante()
    {
        return $this->belongsTo('App\Solicitante', 'id_solicitante');
    }
}

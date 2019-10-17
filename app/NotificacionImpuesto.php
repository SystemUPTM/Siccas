<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_n_tipo_impuesto
 * @property int $id_n_tipo_trimestre
 * @property int $id_impuesto_calculado
 * @property int $nro
 * @property string $fecha
 * @property string $ubicacion
 * @property float $tasa_anual
 * @property int $tasa_trimestral
 * @property string $observaciones
 * @property int $tomo
 * @property NTipoImpuesto $nTipoImpuesto
 * @property NTipoTrimestre $nTipoTrimestre
 * @property ImpuestoCalculado $impuestoCalculado
 */
class NotificacionImpuesto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'notificacion_impuesto';

    /**
     * @var array
     */
    protected $fillable = ['id_n_tipo_impuesto', 'id_n_tipo_trimestre', 'id_impuesto_calculado', 'nro', 'fecha', 'ubicacion', 'tasa_anual', 'tasa_trimestral', 'observaciones', 'tomo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nTipoImpuesto()
    {
        return $this->belongsTo('App\NTipoImpuesto', 'id_n_tipo_impuesto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nTipoTrimestre()
    {
        return $this->belongsTo('App\NTipoTrimestre', 'id_n_tipo_trimestre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function impuestoCalculado()
    {
        return $this->belongsTo('App\ImpuestoCalculado', 'id_impuesto_calculado');
    }
}

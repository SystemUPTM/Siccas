<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $n_tipo_adjudicacion_id
 * @property string $nro_documento
 * @property string $folios
 * @property string $protocolo
 * @property string $tomo
 * @property int $trimestre
 * @property string $fecha
 * @property int $area_total
 * @property int $valor_total
 * @property NTipoAdjudicacion $nTipoAdjudicacion
 * @property Inscripcion[] $inscripcions
 */
class Documento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'documento';

    /**
     * @var array
     */
    protected $fillable = ['n_tipo_adjudicacion_id', 'nro_documento', 'folios', 'protocolo', 'tomo', 'trimestre', 'fecha', 'area_total', 'valor_total', 'observacion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nTipoAdjudicacion()
    {
        return $this->belongsTo('App\NTipoAdjudicacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcions()
    {
        return $this->hasMany('App\Inscripcion', 'id_documento');
    }

    public function getImpuestoBaseAttribute() {
        return $this->area_total * $this->valor_total;
    }
}

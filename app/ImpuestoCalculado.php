<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_propietario
 * @property int $cantidad
 * @property Propietario $propietario
 * @property NotificacionImpuesto[] $notificacionImpuestos
 */
class ImpuestoCalculado extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'impuesto_calculado';

    /**
     * @var array
     */
    protected $fillable = ['id_propietario', 'cantidad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propietario()
    {
        return $this->belongsTo('App\Propietario', 'id_propietario');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notificacionImpuestos()
    {
        return $this->hasMany('App\NotificacionImpuesto', 'id_impuesto_calculado');
    }
}

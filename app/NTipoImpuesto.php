<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property ImpuestoInmobiliario[] $impuestoInmobiliarios
 */
class NTipoImpuesto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'n_tipo_impuesto';

    /**
     * @var array
     */
    protected $fillable = ['nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function impuestoInmobiliarios()
    {
        return $this->hasMany('App\ImpuestoInmobiliario', 'id_n_tipo_impuesto');
    }
}

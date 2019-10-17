<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $frente
 * @property float $fondo
 * @property float $ld
 * @property string $unidad_medida_ld
 * @property float $li
 * @property string $unidad_medida_li
 * @property Inscripcion[] $inscripcions
 */
class Linderos extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['frente', 'fondo', 'ld', 'unidad_medida_ld', 'li', 'unidad_medida_li'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcions()
    {
        return $this->hasMany('App\Inscripcion', 'id_linderos');
    }
}

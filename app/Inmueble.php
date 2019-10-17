<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $ubicacion
 * @property float $area
 * @property float $valor
 * @property Inscripcion[] $inscripcions
 */
class Inmueble extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inmueble';

    /**
     * @var array
     */
    protected $fillable = ['ubicacion', 'area', 'valor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcions()
    {
        return $this->hasMany('App\Inscripcion', 'id_inmueble');
    }
}

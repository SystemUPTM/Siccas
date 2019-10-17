<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $letra
 * @property string $descripcion
 * @property Propietario[] $propietarios
 */
class NTipoRif extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'n_tipo_rif';

    /**
     * @var array
     */
    protected $fillable = ['letra', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propietarios()
    {
        return $this->hasMany('App\Propietario', 'n_tipo_rif');
    }
}

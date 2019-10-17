<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $letra
 * @property Propietario[] $propietarios
 * @property Solicitante[] $solicitantes
 */
class NTipoNacionalidad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'n_tipo_nacionalidad';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'letra'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function propietarios()
    {
        return $this->hasMany('App\Propietario', 'n_tipo_nacionalidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitantes()
    {
        return $this->hasMany('App\Solicitante', 'n_tipo_nacionalidad');
    }
}

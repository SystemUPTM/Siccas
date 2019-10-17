<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $pregunta_id
 * @property int $respuesta
 * @property int $user_id
 */
class ItemRecuperacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'item_recuperacion';

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['pregunta_id', 'respuesta', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function pregunta()
    {
        return $this->belongsTo('App\NPreguntaRecuperacion', 'pregunta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}

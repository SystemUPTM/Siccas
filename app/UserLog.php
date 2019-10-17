<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $log
 * @property datetime $fecha
 * @property User[] $usuario
 */
class UserLog extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_log';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'log', 'fecha'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

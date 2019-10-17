<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property int $parroquia_id
 * @property NParroquia $nParroquia
 */
class NSector extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'n_sector';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'parroquia_id'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nParroquia()
    {
        return $this->belongsTo('App\NParroquia');
    }

}

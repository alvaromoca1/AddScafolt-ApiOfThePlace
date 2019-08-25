<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class place
 * @package App\Models
 * @version August 25, 2019, 3:48 am UTC
 *
 * @property string nombre
 * @property string descripcion
 * @property string url
 * @property string celular
 * @property string longitud
 * @property string latitud
 */
class place extends Model
{
    use SoftDeletes;

    public $table = 'places';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'url',
        'celular',
        'longitud',
        'latitud'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'url' => 'string',
        'celular' => 'string',
        'longitud' => 'string',
        'latitud' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

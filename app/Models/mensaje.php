<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class mensaje
 * @package App\Models
 * @version March 25, 2022, 6:51 am UTC
 *
 * @property string mensaje
 */
class mensaje extends Model
{
    use SoftDeletes;

    public $table = 'mensajes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'mensaje'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mensaje' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mensaje' => 'required|max:150|min:1'
    ];

    
}

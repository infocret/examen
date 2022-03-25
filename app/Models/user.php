<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class user
 * @package App\Models
 * @version March 25, 2022, 2:17 am UTC
 *
 * @property string name
 * @property string email
 * @property string password
 * @property integer rol_id
 * @property string remember_token
 */
class user extends Model
{
    //use SoftDeletes;

    public $table = 'users';
    

    //protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'rol_id' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255|min:1',
        'email' => 'required|max:255|min:1',
        'password' => 'required|max:255|min:1',
        'rol_id' => 'required|max:20|min:1',
        'remember_token' => 'required|max:100|min:1'
    ];

    
}

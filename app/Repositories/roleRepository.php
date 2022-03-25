<?php

namespace App\Repositories;

use App\Models\role;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class roleRepository
 * @package App\Repositories
 * @version March 25, 2022, 4:40 am UTC
 *
 * @method role findWithoutFail($id, $columns = ['*'])
 * @method role find($id, $columns = ['*'])
 * @method role first($columns = ['*'])
*/
class roleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rol'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return role::class;
    }
 // Get roles 
    public function gRoles()  //$cp,$ciudad)
    {
        return role::select("id","rol")->get();
    }

}

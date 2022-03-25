<?php

namespace App\Repositories;

use App\Models\mensaje;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class mensajeRepository
 * @package App\Repositories
 * @version March 25, 2022, 6:51 am UTC
 *
 * @method mensaje findWithoutFail($id, $columns = ['*'])
 * @method mensaje find($id, $columns = ['*'])
 * @method mensaje first($columns = ['*'])
*/
class mensajeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mensaje'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return mensaje::class;
    }
}

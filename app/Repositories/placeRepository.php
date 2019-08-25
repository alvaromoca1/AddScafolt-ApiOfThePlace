<?php

namespace App\Repositories;

use App\Models\place;
use App\Repositories\BaseRepository;

/**
 * Class placeRepository
 * @package App\Repositories
 * @version August 25, 2019, 3:48 am UTC
*/

class placeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'url',
        'celular',
        'longitud',
        'latitud'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return place::class;
    }
}

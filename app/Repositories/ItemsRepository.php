<?php

namespace App\Repositories;

use App\Models\Items;
use InfyOm\Generator\Common\BaseRepository;

class ItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'features',
        'cat_id',
        'subcat_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Items::class;
    }
}

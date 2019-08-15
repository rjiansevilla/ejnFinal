<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

Interface EloquentRepository extends Repository
{
    /**
     * Repository constructor.
     * @param Model $model
     */
    function __construct(Model $model = null);

    /**
     * @return Model
     */
    function getModel();

    /**
     * @return Object
     */
    function setModel($model);
}

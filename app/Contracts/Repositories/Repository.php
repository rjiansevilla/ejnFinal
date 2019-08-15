<?php

namespace App\Contracts\Repositories;

use App\Contracts\CRUDInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package App\Contracts
 */
interface Repository extends CRUDInterface
{
    /**
     * @return Model
     */
    function getModel();

    /**
     * @return  Object
     */
    function setModel($model);

    /**
     * @return string
     */
    public function getTable();
}

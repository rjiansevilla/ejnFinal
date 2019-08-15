<?php

namespace App\Contracts\Services;

use App\Contracts\CRUDInterface;
use App\Contracts\Repositories\Repository;

/**
 * Class Service
 * @package App\Contracts
 */
interface Service extends CRUDInterface
{
    /**
     * Service constructor.
     * @param Repository $repository
     */
    function __construct(Repository $repository);

    /**
     * @return Repository
     */
    function getRepository();
}

<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\EloquentRepository as RepositoryContract;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Repository
 * @package App\Repositories
 */
class Repository implements RepositoryContract
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model = null)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    function get($id)
    {
        return $this->getModel()->find($id);
    }

    /**
     * @param null
     * @return all
     */
    function getDataList()
    {
        return $this->getModel()->get();
    }

    /**
     * @param array $where
     * @param int $page
     * @param int $size
     * @param array $orderBy
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function find(array $where, $page = 0, $size = 25, $orderBy = [])
    {
        // Add the where query
        $searchQuery = $this->getModel()->where($where);
        
        // Adding pagination
        $searchQuery->limit($size);
        $searchQuery->offset(intval($page) * intval($size));

        // Order by the results.
        if (!empty($orderBy)) {
            $searchQuery->orderBy($orderBy[0], $orderBy[1]);
        }

        // return the result.
        return $searchQuery->get();
    }

    /**
     * @param array $data
     * @return $this|Model
     */
    function save(array $data)
    {
        return $this->getModel()->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    function update($id, array $data)
    {
        $record = $this->get($id);

        if (!empty($record)) {
            $record->fill($data);
            return $record->save();
        }

        throw new NotFoundHttpException(get_class($this->getModel()). " not found!");
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return mixed
     */
    function delete($id)
    {
        return $this->getModel()->destroy($id);
    }


    /**
     * 
     * @param $model
     *
     * @return object
     */
    function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return Model
     */
    function getModel()
    {
        return $this->model;
    }

    function getTable() 
    {
    	return $this->getModel()->getTable();
    }
}

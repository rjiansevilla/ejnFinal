<?php

namespace App\Services;

use App\Contracts\Repositories\Repository;
use App\Contracts\Services\Service as ServiceContract;
use Auth;

/**
 * Class Service
 * @package App\Services
 */
class Service implements ServiceContract
{
    /**
     * @var Repository
     */
    protected $repository;

    /**
     * Service constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     */
    function get($id)
    {
        return $this->repository->get($id);
    }

    /**
     * @param null
     * @return mixed
     */
    function getDataList()
    {
        return $this->repository->getDataList();
    }

    /**
     * @param array $where
     * @param int $page
     * @param int $size
     * @param array $orderBy
     *
     * @return mixed
     */
    function find(array $where, $page = 0, $size = 25, $orderBy = [])
    {
        return $this->repository->find($where, $page, $size, $orderBy);
    }

    /**
     * @param array $data
     * @return mixed
     */
    function save(array $data)
    {
        return $this->repository->save($data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return mixed
     */
    function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return mixed
     */
    function delete($id)
    {
        return $this->repository->delete($id);
    }

    /**
     * @return Repository
     */
    function getRepository()
    {
        return $this->repository;
    }

    function getLoggedInUser() {
        return Auth::check() ? Auth::user() : false;
    }

    /**
     * [fileUpload this will upload files base on submit]
     * @param  [type] $files [description]
     * @param  [type] $path   [description]
     * @return [type]         [description]
     */
    function fileUpload($files, $path)
    {
        $fileName = time().'.'.$files->getClientOriginalExtension();
    
        $destinationPath = storage_path($path);

        //this will create a directory if folder is missing
        if (!file_exists($destinationPath)) {
            \File::makeDirectory($destinationPath, 0777, true, true);
        }
        
        $files->move($destinationPath, $fileName);
        
        return $fileName;
    }

}

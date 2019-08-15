<?php

namespace App\Contracts;

/**
 * Interface CRUDInterface
 * @package Pyntax\Contracts
 */
interface CRUDInterface
{
    /**
     * @param $id
     * @return mixed
     */
    function get($id);

    /**
     * @param null
     * @return mixed
     */
    function getDataList();

    /**
     * @param array $where
     * @param int $page
     * @param int $size
     * @param array $orderBy
     *
     * @return mixed
     */
    function find(array $where, $page = 0, $size = 25, $orderBy = []);

    /**
     * @param array $data
     * @return mixed
     */
    function save(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    function update($id, array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    function delete($id);


    /**
     * @param $idOrWhere
     * @return mixed
     */

    // function delete($idOrWhere);
}

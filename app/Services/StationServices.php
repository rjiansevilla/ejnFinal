<?php
namespace App\Services;

use App\Traits\Cachable;
use Auth;

class StationServices extends Service
{
    use Cachable;

    /**
     * Get all stations
     * 
     * @return array
     */
    public function getStations()
    {
        $data = $this->getDataList();

        return $data;
    }
/**
     * Delete Station
     * 
     * @params $id int
     * @return boolean
     */
    public function deleteStation($id)
    {
        $delete = $this->delete($id);

        if ($delete) {
            $arrData['status'] = "success";
            $arrData['message'] = "Record Deleted!";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;
    }

    /**
     * Submit new station
     * 
     * @params $data array
     * @return boolean
     */
    public function submitStation($data = array())
    {
        $data['user_id'] = Auth::user()->id;
        $save = $this->save($data);

        if ($save) {
            $arrData['status'] = "success";
            $arrData['message'] = "Successfully Added New Station!";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;
    }

}
<?php
namespace App\Services;

use App\Traits\Cachable;
use Auth;

class BankServices extends Service
{
    use Cachable;

    /**
     * Update bank
     * 
     * @params $id int, $data array
     * @return boolean
     */
    public function updateBank($id, $request)
    {
        $update = $this->update($id, $request);

        if ($update) {
            $arrData['status'] = "success";
            $arrData['message'] = "Record Updated!";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;
    }

    /**
     * Delete bank
     * 
     * @params $id int
     * @return boolean
     */
    public function deleteBank($id)
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
     * Submit new bank
     * 
     * @params $data array
     * @return boolean
     */
    public function submitBank($data = array())
    {
        $data['user_id'] = Auth::user()->id;
        $save = $this->save($data);

        if ($save) {
            $arrData['status'] = "success";
            $arrData['message'] = "Successfully Added New Bank!";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;
    }
}
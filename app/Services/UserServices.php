<?php

namespace App\Services;

use App\Traits\Cachable;
use Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class BlocksServices
 * @package App\Services
 */

class UserServices extends Service
{
    use Cachable;

    /**
     * Create new user
     * 
     * @params $data array
     * @return array
     */
    public function createUser($data = array())
    {
        $data['name'] = $data['fname']." ".$data['lname'];
        $data['password'] = Hash::make($data['password']);

        $save = $this->save($data);

        if ($save) {
            $arrData['status'] = "success";
            $arrData['message'] = "User Created!";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;


    }

    /**
     * Delete user
     * 
     * @params $id int
     * @return boolean
     */
    public function deleteUser($id)
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
     * User list
     * 
     * @return array
     */
    public function userList()
    {
        $users = $this->getDataList();

        $userList = 0;
        $userList = count($users);

        return $userList;
    }

    /**
     * Get all users
     * 
     * @return array
     */
    public function getUsers()
    {
        $users = $this->getDataList();

        $arrUsers = [];

        if (count($users) > 0) {
            foreach ($users as $row) {
                $arrUsers[] = [
                    "id" => $row->id,
                    "name" => $row->name,
                    "email" => $row->email,
                ];
            }
        }
        return $arrUsers;
    }


    /**
     * [updateUser description]
     * @return boolean
     */
    public function updateUser($data = array())
    {
    	$update = $this->getRepository()->update(Auth::user()->id, $data);
    	return $update;
    }


    public function getProfessorList()
    {
    	return $this->getRepository()->find(
    			[
    				'school_id' 	=> Auth::user()->school_id,
    				'user_type_id' 	=> 2,
    				'is_active'		=> 1
    			]
    		);
    }
}

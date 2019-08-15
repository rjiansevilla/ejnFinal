<?php
namespace App\Services;

use App\Traits\Cachable;
use Auth;

class AgentServices extends Service
{
    use Cachable;
    
    /**
     * Get all agents to diplay.
     * 
     * @return array
     */
    public function getAgents()
    {
        $data = $this->getRepository()->getModel()
                        ->orderBy('created_at', "DESC")
                        ->get();

        return $data;
    }
    
    /**
     * Add agents
     * 
     * @param $data array
     * @return array
     */
    public function addAgent($data = array())
    {
        $data['name'] = $data['fname']." ".$data['lname'];
        $data['user_id'] = Auth::user()->id;
        $save = $this->save($data);

        if ($save) {
            $arrData['status'] = "success";
            $arrData['message'] = "Successfully Added New Agent!";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;
    }
}
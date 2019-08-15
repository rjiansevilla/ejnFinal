<?php
namespace App\Services;

use App\Traits\Cachable;
use Auth;


class ChequeServices extends Service
{
    /**
     * Generate payee report
     * 
     * @params $data array
     * @return array
     */
    public function payeeReport($data = array())
    {
        $report = $this->getRepository()->getModel()
                        ->where('agent_id', $data['agent'])
                        ->get();

        $arrData = [];
        if (count($report) > 0) {
            foreach ($report as $row) {
                $arrData[] = [
                    "date" => date('d F, Y', strtotime($row->created_at)),
                    "payee" => $row->agent->name,
                    "cheque_no" => $row->cheque_no,
                    "bank" => $row->bank->name,
                    "amount" => $row->amount
                ];
            }
        }
        
        return $arrData;
    }

    /**
     * Generate account report
     * 
     * @params $data array
     * @return array
     */
    public function generateAccountPDF($data = array())
    {
        $data = $this->getRepository()->getModel()
                        ->where('bank_id', $data['bank'])
                        ->whereBetween('created_at', [$data['date_from'], $data['date_to']])
                        ->get();
        
        $arrData = [];
        if (count($data) > 0) {
            foreach ($data as $row) {
                $arrData[] = [
                    "cheque_no" => $row->cheque_no,
                    "date" => date('d F, Y', strtotime($row->created_at)),
                    "amount" => $row->amount,
                    "payee" => $row->transaction->agent->name
                ];
            }
        }
        return $arrData;
    }

    /**
     * Issue voucher
     * 
     * @params $id int
     * @return array
     */
    public function issueVoucher($id)
    {
       $row = $this->getRepository()->getModel()
                        ->where('transaction_id', $id)
                        ->get();
                        
        $arrVoucher = [
            "id" => $row[0]->id,
            "transaction_no" => $row[0]->transaction->transaction_no,
            "agent" => $row[0]->transaction->agent->name,
            "bank" => $row[0]->bank->name,
            "cheque_no" => $row[0]->cheque_no,
            "amount" => $row[0]->amount,
            "date" => date("d F, Y", strtotime($row[0]->created_at))
        ];
        
        return $arrVoucher;
    }

    /**
     * Save new cheque
     * 
     * @params $data array
     * @return boolean
     */
    public function saveCheque($data)
    {

        $save = $this->save($data);

        if ($save) {
            $arrData['status'] = "success";
            $arrData['message'] = "Transaction success";
        } else {
            $arrData['status'] = "faile";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;
    }

        /**
     * Delete cheque
     * 
     * @params $id int
     * @return boolean
     */
    public function deleteCheque($id)
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
}
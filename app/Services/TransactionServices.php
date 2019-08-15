<?php
namespace App\Services;

use App\Traits\Cachable;
use Auth;

// Models
use App\Models\Logs;

// Events
use App\Events\TransactionLogsEvent;

class TransactionServices extends Service
{

    /**
     * Get transaction of user
     * 
     * @return array
     */
    public function myTransaction()
    {
        $myTransaction = $this->getRepository()->getModel()
                                ->where('user_id', Auth::user()->id)
                                ->get();
        $numberOfTransaction = 0;
        $numberOfTransaction = count($myTransaction);

        return $numberOfTransaction;
    }

    /**
     * Get selected transaction to issue cheque
     * 
     * @params $id int
     * @return array
     */
    public function getTransaction($id)
    {
        $row = $this->get($id);

        $arrData = [
            "id" => $row->id,
            "agent" => $row->agent->name,
            "agent_id" => $row->agent_id,
            "transaction_no" => $row->transaction_no,
            "amount" => $row->amount,
            "date" => date("d F, Y", strtotime($row->created_at))
        ];

        return $arrData;
    }

    /**
     * Get transaction list where not issue cheque
     * 
     * @paramsa $id int
     * @return array
     */
    public function getTransactionList($id)
    {
        $transactions = $this->getRepository()->getModel()
                            ->where('product_id', $id)
                            ->where('is_issue', 0)
                            ->orWhere('is_voucher', 0)
                            ->get();

        $arrData = [];

        if (count($transactions) > 0) {
            foreach ($transactions as $row) {
                $arrData[] = [
                    "id" => $row->id,
                    "quality" => $row->quality,
                    "sacks" => $row->sacks,
                    "gross" => $row->gross_weight,
                    "net" => $row->net_weight,
                    "moisture" => $row->moisture,
                    "ntc" => $row->ntc,
                    "discount" => $row->discount,
                    "others" => $row->others,
                    "unit_price" => $row->unit_price,
                    "total_price" => $row->total_price,
                    "amount" => $row->amount,
                    "date" => date("d F, y", strtotime($row->created_at)),
                    "transaction_no" => $row->transaction_no,
                    "station" => $row->station->name,
                    "agent" => $row->agent->name,
                    "product" => $row->product->name,
                    "is_issue" => $row->is_issue,
                    "is_voucher" => $row->is_voucher
                ];
            }
        }

        return $arrData;

        
    }

    /**
     * View transction
     * 
     * @params $id int
     * @return array
     */
    public function viewTransaction($id)
    {
        $row = $this->get($id);
        $arrTransaction = [
            "id" => $row->id,
            "quality" => $row->quality,
            "sacks" => $row->sacks,
            "gross" => $row->gross_weight,
            "net" => $row->net_weight,
            "moisture" => $row->moisture,
            "ntc" => $row->ntc,
            "discount" => $row->discount,
            "others" => $row->others,
            "unit_price" => $row->unit_price,
            "total_price" => $row->total_price,
            "amount" => $row->amount,
            "date" => date("d F, y", strtotime($row->created_at)),
            "transaction_no" => $row->transaction_no,
            "station" => $row->station->name,
            "agent" => $row->agent->name,
            "product" => $row->product->name
        ];

        return $arrTransaction;
    }

    /**
     * Get transactions logs
     * 
     * @return array
     */
    public function getLogs()
    {
        $logs = Logs::latest()->get();

        $arrLogs = [];
        if (count($logs) > 0) {
            foreach ($logs as $row) {
                $arrLogs[] = [
                    "id" => $row->id,
                    "date" => date("d F, y", strtotime($row->created_at)),
                    "time" => date("H:i a", strtotime($row->created_at)),
                    "ip" => $row->ip_address,
                    "user" => $row->user->name,
                    "product" => $row->transaction->product->name
                ];
            }
        }

        return $arrLogs;
    }

    /**
     * Get the product transactions list
     * 
     * @params $id int
     * @return array
     */
    public function transactions($id)
    {
        $transactions = $this->getRepository()->getModel()
                                ->where('product_id', $id)
                                ->where('is_issue', 1)
                                ->where('is_voucher', 1)
                                ->latest()
                                ->get();
        
        $arrData = [];
        
        if (count($transactions) > 0) {
            foreach ($transactions as $row) {
                $arrData[] = [
                    "id" => $row->id,
                    "quality" => $row->quality,
                    "sacks" => $row->sacks,
                    "gross" => $row->gross_weight,
                    "net" => $row->net_weight,
                    "moisture" => $row->moisture,
                    "ntc" => $row->ntc,
                    "discount" => $row->discount,
                    "others" => $row->others,
                    "unit_price" => $row->unit_price,
                    "total_price" => $row->total_price,
                    "amount" => $row->amount,
                    "date" => date("d F, y", strtotime($row->created_at)),
                    "transaction_no" => $row->transaction_no,
                    "station" => $row->station->name,
                    "agent" => $row->agent->name,
                    "product" => $row->product->name
                ];
            }
        }

        return $arrData;
    }

    /**
     * Submit a new transaction.
     * 
     * @params $data array
     * @return array
     */
    public function submitTransaction($data = array())
    {
        $data['user_id'] = Auth::user()->id;

        $latestTransaction = $this->getRepository()->getModel()
                            ->latest()
                            ->first();

        if ($latestTransaction == null) {
            $save = $this->save($data);

        } else {
            // Iterate new transaction number
            $explodeTransaction = explode("-", $latestTransaction['transaction_no']);
            $prefixTransaction = $explodeTransaction[0];
            $transactionNo = $explodeTransaction[1] + 1;
            $data['transaction_no'] = $prefixTransaction."-".str_pad($transactionNo, 6, "000000", STR_PAD_LEFT);

            $save = $this->save($data);
        }

        // Transaction array logs
        $arrLog = [
            "user_id" => Auth::user()->id,
            "transaction_id" => $save->id,
            "ip_address" => \Request::getClientIp(true)
        ];
        $logs = event(new TransactionLogsEvent($this->getRepository()->getModel(),$arrLog));

        if ($save) {
            $arrData["status"]  = "success";
            $arrData["message"] = "Created New Transaction";
        } else {
            $arrData["status"]  = "error";
            $arrData["message"] = "Error, Something went wrong";
        }

        return $arrData;
    }
}
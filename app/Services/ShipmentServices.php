<?php
namespace App\Services;

use App\Traits\Cachable;
use Auth;

class ShipmentServices extends Service
{
    use Cachable;

    /**
     * My shipment today
     * 
     * @return array
     */
    public function shipToday()
    {
        $shipments = $this->getRepository()->getModel()
                            ->where('user_id', Auth::user()->id)
                            ->where('ship_date', date("Y-m-d"))
                            ->get();
        $shipmentToday = 0;
        $shipmentToday = count($shipments);

        
        $arrData['shipmentToday'] = $shipmentToday;
        $arrData['shipments'] = $shipments;

        return $arrData;
    }

    /**
     * Update shipment done
     * 
     * @params $id int
     * @return array
     */
    public function shipDone($id)
    {
        $update = $this->update($id, ["is_ship" => 1]);

        if ($update) {
            $arrData['status'] = "success";
            $arrData['message'] = "Shipment Done";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;

    }

    /**
     * View shipment
     * 
     * @params $id int
     * @return array
     */
    public function viewShipment($id)
    {
        $row = $this->get($id);

        $arrData = [
            "id" => $row->id,
            "date" => date("d F, y", strtotime($row->create_at)),
            "van_no" => $row->van_no,
            "bl_no" => $row->bl_no,
            "ship_date" => date("d F, y", strtotime($row->ship_date)),
            "ship_to" => $row->ship_to,
            "ship_from" => $row->ship_from,
            "price" => $row->price,
            "shipment_no" => $row->shipment_no,
            "bales" => $row->bales,
            "kls" => $row->kls,
            "others" => $row->others,
            "status" => $row->status,
            "is_ship" => $row->is_ship
        ];

        return $arrData;
    }

    /**
     * Get all shipments
     * 
     * @return array
     */
    public function getShipments()
    {
        $shipments = $this->getDataList();

        $arrData = [];

        if (count($shipments) > 0) {
            foreach ($shipments as $row) {
                $arrData[] = [
                    "id" => $row->id,
                    "van_no" => $row->van_no,
                    "bl_no" => $row->bl_no,
                    "ship_date" => date("d F, y", strtotime($row->ship_date)),
                    "ship_to" => $row->ship_to,
                    "ship_from" => $row->ship_from,
                    "price" => $row->price,
                    "shipment_no" => $row->shipment_no,
                    "bales" => $row->bales,
                    "kls" => $row->kls,
                    "others" => $row->others,
                    "status" => $row->status,
                    "is_ship" => $row->is_ship
                ];
            }
        }

        return $arrData;
    }

    /**
     * Create new shipment
     * 
     * @params $data array
     * @return array
     */
    public function createShipment($data = array())
    {
        $data['user_id'] = Auth::user()->id;
        $latestShipment = $this->getRepository()->getModel()
                            ->latest()
                            ->first();
        
        if ($latestShipment == null) {
            $save = $this->save($data);

        } else {
            // Iterate new shipment number
            $explodeShipment = explode("-", $latestShipment['shipment_no']);
            $prefixShipment = $explodeShipment[0];
            $shipmentNo = $explodeShipment[1] + 1;
            $data['shipment_no'] = $prefixShipment."-".str_pad($shipmentNo, 6, "000000", STR_PAD_LEFT);

            $save = $this->save($data);
        }
        

        if ($save) {
            $arrData['status'] = "success";
            $arrData['message'] = "Shipment Success";
        } else {
            $arrData['status'] = "error";
            $arrData['message'] = "Something went wrong!";
        }

        return $arrData;
    }

}
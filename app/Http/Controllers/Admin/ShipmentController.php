<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;

// Services
use App\Services\TransactionServices;
use App\Services\ShipmentServices;

// Requests
use App\Http\Requests\ShipmentRequest;

class ShipmentController extends Controller
{
    private $transaction; 
    private $shipment;

    public function __construct(TransactionServices $transaction, ShipmentServices $shipment)
    {
        $this->transaction = $transaction;
        $this->shipment = $shipment;
    }

    // Shipment done
    public function shipDone($id)
    {
        $data = $this->shipment->shipDone($id);

        return redirect('shipments')
                        ->with('status', $data['status'])
                        ->with('message', $data['message']);
    }

    // View shipment
    public function viewShipment($id)
    {
        $shipment = $this->shipment->viewShipment($id);
        $data = [
            "title" => "Shipment",
            "shipment" => $shipment
        ];

        return view('admin.shipment.view-shipment', compact('data'));
    }

    // Create new shipment
    public function createShipment(ShipmentRequest $request)
    {
        $request = \Request::all();
        unset($request['_token']);
        $data = $this->shipment->createShipment($request);

        return redirect('shipment-form')
                    ->with('status', $data['status'])
                    ->with('message', $data['message']);
    }

    // Shipment transaction form
    public function shipmentForm()
    {
        $data = [
            "header" => "Shipments Form",
            "title" =>  "Shipments Form",
            "date"  => date("d F, y")
        ];

        return view('admin.shipment.shipment-transaction', compact('data'));   
    }

    // Shipments display
    public function shipments()
    {
        $data = [
            "header" => "Shipments Transaction",
            "title" =>  "Shipments Transaction",
            "shipments" => $this->shipment->getShipments()
        ];

        return view('admin.shipment.shipments', compact('data'));
    }
}
<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

// Services
use App\Services\TransactionServices;
use App\Services\ShipmentServices;
use App\Services\UserServices;

class DashboardController extends Controller
{
    private $transaction, $shipment, $user;

    public function __construct(
        TransactionServices $transaction,
        ShipmentServices $shipment,
        UserServices $user
    )
    {
        $this->transaction = $transaction;
        $this->shipment = $shipment;
        $this->user = $user;
    }

    // Display shipment today
    public function shipmentToday()
    {
        $shipToday = $this->shipment->shipToday();

        $data = [
            "header" => "Shipment Today",
            "title" => "Shipment Today",
            "shipments" => $shipToday['shipments']
        ];

        return view('admin.dashboard.shipment-today', compact('data'));
    }

    // Display my transaction list
    public function myTransactions()
    {
        $data = [
            "header" => "My Transaction",
            "title" => "My Transaction"
        ];

        return view('admin.dashboard.my-transaction', compact('data'));
    }

    // Dashboard display
    public function index()
    {
        $myTransaction = $this->transaction->myTransaction();
        $users = $this->user->userList();
        $shipToday = $this->shipment->shipToday();

        $data = [
            "myTransaction" => $myTransaction,
            "users" => $users,
            "shipToday" => $shipToday['shipmentToday']
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}

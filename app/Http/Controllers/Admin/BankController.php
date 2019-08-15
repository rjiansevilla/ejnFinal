<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

// Services
use App\Services\BankServices;

class BankController extends Controller
{
    private $bank;

    public function __construct(BankServices $bank)
    {
        $this->bank = $bank;
    }

    // Get account number
    public function accountNumber($id)
    {
        $data = $this->bank->get($id);

        return response()->json(compact('data'));
    }

    // Update bank
    public function updateBank($id)
    {
        $request = \Request::all();
        unset($request['_token']);
        $data = $this->bank->updateBank($id, $request);
        
        if ($data['status'] == "success") {
            return redirect('banks')
                        ->with('status', $data['status'])
                        ->with('message', $data['message']);
        }
    }

    // Edit bank load form
    public function editBank($id)
    {
        $data = [
            "header" => "Edit",
            "title" => "Edit",
            "bank"  => $this->bank->get($id)
        ];

        return view('admin.bank.edit-bank', compact('data'));
    }

    // Delete bank
    public function deleteBank($id)
    {
        $data = $this->bank->deleteBank($id);

        return response()->json(compact('data'));
    }

    // Submit new bank
    public function submitBank()
    {
        $request = \Request::all();
        unset($request['_token']);
        $data = $this->bank->submitBank($request);

        return redirect('new-bank')
                    ->with('status', $data['status'])
                    ->with('message', $data['message']);
    }

    // Display bank form
    public function bankForm()
    {
        $data = [
            "header" => "Bank Form",
            "title" => "Bank Form"
        ];

        return view('admin.bank.create-bank', compact('data'));
    }

    // Display all banks
    public function banks()
    {
        $data = [
            "header" => "Banks",
            "title" => "Banks",
            "banks" => $this->bank->getDataList()
        ];

        return view('admin.bank.banks', compact('data'));
    }
}


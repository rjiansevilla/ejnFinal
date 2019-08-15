<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;
use PDF;

// Models
use App\Models\Banks;
use App\Models\Agents;
use App\Models\Cheque;

// Services
use App\Services\ChequeServices;
use App\Services\TransactionServices;

class ReportController extends Controller
{
    private $cheque;
    private $transaction;

    public function __construct(ChequeServices $cheque, TransactionServices $transaction)
    {
        $this->cheque = $cheque;
        $this->transaction = $transaction;
    }

    // Display payee report
    public function payeeReportPDF()
    {
        $request = \Request::all();
        unset($request['_token']);

        $data = $this->cheque->payeeReport($request);
        $amount = 0;

        foreach($data as $value) {
            $amount += $value['amount'];
        }

        $date = date('d F, Y');
        $pdf = PDF::loadView('admin.report.payee-pdf', array('data' => $data, 'date' => $date, 'amount' => $amount));
        return $pdf->stream('payee.pdf');
    }

    // Display account report
    public function generateAccountPDF()
    {
        $request = \Request::all();
        unset($request['_token']);

        $bank = Banks::where('id', $request['bank'])->first();
        $accNum = $bank->account_no;
        $bankName = $bank->name;
        $data = $this->cheque->generateAccountPDF($request);

        $totalAmount = 0;
        foreach($data as $value) {
            $totalAmount += $value['amount'];
        }

        $request['date_from'] = date('d F, Y', strtotime($request['date_from']));
        $request['date_to'] = date('d F, Y', strtotime($request['date_to']));
        $date = date('d F, Y');

        $pdf = PDF::loadView('admin.report.account-pdf', array('data' => $data, 'request' => $request, 'account' => $accNum, 'amount' => $totalAmount, 'bank' => $bankName, 'date' => $date));
        return $pdf->stream('account.pdf');
    }

    // Display account report
    public function accountReport()
    {
        $data = [
            "header" => "Account Report",
            "title" => "Report",
            "banks" => Banks::get()
        ];

        return view('admin.report.account-report', compact('data'));
    }

    // Display payee report
    public function payeeReport()
    {

    $data = [
            "header" => "Payee Report",
            "title" => "Report",
            "agents" => Agents::get()

        ]; 

        return view('admin.report.payee-report', compact('data'));
    }

}
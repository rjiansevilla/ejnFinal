<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use PDF;

// Services
use App\Services\ChequeServices;
use App\Services\ProductServices;
use App\Services\TransactionServices;

// Models
use App\Models\Banks;

class ChequeController extends Controller
{
    private $cheque;
    private $product;
    private $transaction;

    public function __construct(
        ChequeServices $cheque, 
        ProductServices $product,
        TransactionServices $transaction
    )
    {
        $this->cheque = $cheque;
        $this->product = $product;
        $this->transaction = $transaction;
    }

    // Issue voucher
    public function issueVoucher($id)
    {
        $data = $this->cheque->issueVoucher($id);

        if (!empty($data)) {
            $this->transaction->update($id, ["is_voucher" => 1]);

            $pdfData = [
                "date" => date("d F, y"),
                "date_issue" => $data['date'],
                "transaction_no" => $data['transaction_no'],
                "bank" => $data['bank'],
                "agent" => $data['agent'],
                "cheque_no" => $data['cheque_no'],
                "amount" => $data['amount']
            ];
    
            $pdf = PDF::loadView('admin.cheque.voucher', $pdfData);
            return $pdf->stream('voucher.pdf');
        }
    }

    // Save cheque
    public function saveCheque(Request $request)
    {
        $request = \Request::all();
        unset($request['_token']);
        $data = $this->cheque->saveCheque($request);

        if ($data['status'] == "success") {
            $this->transaction->update($request['transaction_id'], ["is_issue" => 1]);

            $pdfData = [
                "date" => date("d F, Y"),
                "amount" => $request['amount'],
                "cheque_no" => $request['agent'],
                "words" => $request['amount_words']
            ];
    
            $pdf = PDF::loadView('admin.cheque.cheque', $pdfData);
            return $pdf->stream('cheque.pdf');
        }
    }

    // Issue cheque form
    public function issueCheque($id)
    {
        $transaction = $this->transaction->getTransaction($id);
        $data = [
            "transaction" => $transaction,
            "banks" => Banks::get()
        ];

        return view('admin.cheque.cheque-form', compact('data'));
    }

    // Cheque List
    public function chequeList($id)
    {
        $transactions = $this->transaction->getTransactionList($id);
        $data = [
            "header" => "Transaction List",
            "title" => "Issue Transction",
            "transactions" => $transactions
        ];

        return view('admin.cheque.cheque-list', compact('data'));
    }

    // Display product to issue cheque
    public function issueTransaction()
    {
        $data = [
            "header" => "Issue Cheque",
            "title" => "Issue Cheque",
            "products" => $this->product->getProducts()
        ];

        return view('admin.cheque.cheque-transaction', compact('data'));
    }
}
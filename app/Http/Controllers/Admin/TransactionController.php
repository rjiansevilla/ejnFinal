<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;
use PDF;

// Services
use App\Services\AgentServices;
use App\Services\ProductServices;
use App\Services\TransactionServices;

// Requests
use App\Http\Requests\TransactionRequest;

// Models
use App\Models\Banks;

class TransactionController extends Controller
{
    private $agent;
    private $product;
    private $transaction;

    public function __construct(AgentServices $agent, ProductServices $product, TransactionServices $transaction)
    {
        $this->agent = $agent;
        $this->product = $product;
        $this->transaction = $transaction;
    }

    // View transction
    public function viewTransaction($transactionId)
    {
        $id = base64_decode($transactionId);
        $transaction = $this->transaction->viewTransaction($id);
        $data = [
            "title" => 'Transaction',
            "transaction" => $transaction
        ];

        return view('admin.transaction.view-transaction', compact('data'));
    }

      public function viewTransactionCopra($transactionId)
    {
        $id = base64_decode($transactionId);
        $transaction = $this->transaction->viewTransaction($id);
        $data = [
            "title" => 'Transaction',
            "transaction" => $transaction
        ];

        return view('admin.transaction.view-transaction-copra', compact('data'));
    }

      public function viewTransactionCoffee($transactionId)
    {
        $id = base64_decode($transactionId);
        $transaction = $this->transaction->viewTransaction($id);
        $data = [
            "title" => 'Transaction',
            "transaction" => $transaction
        ];

        return view('admin.transaction.view-transaction-coffee', compact('data'));
    }
   // Generate PDF View Report
    public function TransactionReportPDF($printPDF)
    {
        $id = base64_decode($transactionId);
        $transaction = $this->transaction->viewTransaction($id);
        $data = [
            "title" => 'Transaction',
            "transaction" => $transaction
        ];

        $pdf = PDF::loadview('admin.transaction.transaction-report',compact('data'));
        // return $pdf->download('TransactionReport.pdf');
        // return view('admin.transaction.transaction-report', compact('data'));
        // return view('admin.transaction.transaction-product', compact('data'));
    }
    // Transaction Logs
    public function transactionLogs()
    {
        $data = [
            "header" => 'Transaction Logs',
            "title" => 'Transaction Logs',
            "logs" => $this->transaction->getLogs()
        ];

        return view('admin.transaction.transaction-logs', compact('data'));
    }

    // Transactions of products
    // Params $product array base64_encode
    public function transactions($product)
    {
        $productDecode = base64_decode($product);
        $productSplit = explode("-", $productDecode);
        $transactions = $this->transaction->transactions($productSplit[0]);

        $data = [
            "header" => $productSplit[1]." Transactions",
            "title" => $productSplit[1]." Transactions",
            "transactions" => $transactions
        ];

        return view('admin.transaction.transactions', compact('data'));
    }

     public function transactionsCoffee($product)
    {
        $productDecode = base64_decode($product);
        $productSplit = explode("-", $productDecode);
        $transactions = $this->transaction->transactions($productSplit[0]);

        $data = [
            "header" => $productSplit[1]." Transactions",
            "title" => $productSplit[1]." Transactions",
            "transactions" => $transactions
        ];

        return view('admin.transaction.transactions-coffee', compact('data'));
    }

 public function transactionsCopra($product)
    {
        $productDecode = base64_decode($product);
        $productSplit = explode("-", $productDecode);
        $transactions = $this->transaction->transactions($productSplit[0]);

        $data = [
            "header" => $productSplit[1]." Transactions",
            "title" => $productSplit[1]." Transactions",
            "transactions" => $transactions
        ];

        return view('admin.transaction.transactions-copra', compact('data'));
    }
    // List of products in transactions
    public function transactionProduct()
    {
        $data = [
            "header" => "Product Transactions",
            "title" => "Product Transactions",
            "products" => $this->product->getProducts()
        ];

        return view('admin.transaction.transaction-product', compact('data'));
    }
 


    // Submit new transaction
    public function submitTransaction(TransactionRequest $request)
    {
        $request = \Request::all();
        unset($request['_token']);

        $data = $this->transaction->submitTransaction($request);
        return redirect('products')
                ->with('status', $data['status'])
                ->with('message', $data['message']);
    }

    // Get all agents to display
    public function getAgents()
    {
        $data = $this->agent->getAgents();

        return response()->json(compact('data'));
    }

    // Add agents
    public function addAgent(Request $request)
    {
        $request = \Request::all();
        unset($request['_token']);

        $data = $this->agent->addAgent($request);

        return response()->json(compact('data'));
    }

  
    // Transaction form of Coffee, Rubber and Copra
    public function transactionForm($id)
    {
        $decodeId = base64_decode($id);
        $data = [
            "header" => "Transaction Form",
            "title" => "Transaction Form",
            "stations" => $this->product->getStations(),
            "date" => date("d F, y"),
            "product_id" => $decodeId
        ];

        return view('admin.products.transaction-form', compact('data'));
    }
     public function transactionFormCoffee($id)
    {
        $decodeId = base64_decode($id);
        $data = [
            "header" => "Transaction Form",
            "title" => "Transaction Form",
            "stations" => $this->product->getStations(),
            "date" => date("d F, y"),
            "product_id" => $decodeId
        ];

        return view('admin.products.transaction-form-coffee', compact('data'));
    }
    public function transactionFormCopra($id)
    {
        $decodeId = base64_decode($id);
        $data = [
            "header" => "Transaction Form",
            "title" => "Transaction Form",
            "stations" => $this->product->getStations(),
            "date" => date("d F, y"),
            "product_id" => $decodeId
        ];

        return view('admin.products.transaction-form-copra', compact('data'));
    }
}
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::namespace('Admin')->group(function(){
	Route::group(['middleware' => ['auth']], function(){
		
		// DASHBOARD CONTROLLER
		// GET
		Route::get('/dashboard', ['as' => 'admin-dashboard', 'uses' => 'DashboardController@index'])->name('dashboard');
		Route::get('/my-transaction', 'DashboardController@myTransactions')->name('my-transaction-list');
		Route::get('/shipment-today', 'DashboardController@shipmentToday')->name('shipment-list-today');

		// POST

		// PRODUCT CONTROLLER
		// GET
		Route::get('/products', 'ProductsController@products')->name('list-of-products');

		// POST

		// TRANSACTION CONTROLLER
		// GET
		Route::get('/transaction-form/{id}', 'TransactionController@transactionForm')->name('transaction-form');
		Route::get('/transaction-form.coffee/{id}', 'TransactionController@transactionFormCoffee')->name('transaction-form.coffee');
		 Route::get('/transaction-form.copra/{id}', 'TransactionController@transactionFormCopra')->name('transaction-form.copra');
		Route::get('/get-agents', 'TransactionController@getAgents')->name('get-all-agents');
		Route::get('/transaction-product', 'TransactionController@transactionProduct')->name('transactions-of-product');
		Route::get('/transaction-logs', 'TransactionController@transactionLogs')->name('transaction-logs');

		// Display Transaction
		Route::get('/transactions/{product}', 'TransactionController@transactions')->name('list-of-transactions');
		Route::get('/transactionsCoffee/{product}', 'TransactionController@transactionsCoffee')->name('list-of-transactions');
		Route::get('/transactionsCopra/{product}', 'TransactionController@transactionsCopra')->name('list-of-transactions');

		// View Transaction
		Route::get('/view-transaction/{id}', 'TransactionController@viewTransaction')->name('view-transaction');
		Route::get('/view-transaction.coffee/{id}', 'TransactionController@viewTransactionCoffee')->name('view-transaction.coffee');
		Route::get('/view-transaction.copra/{id}', 'TransactionController@viewTransactionCoffee')->name('view-transaction.copra');

		// POST
		Route::post('/add-agent', 'TransactionController@addAgent')->name('add-agent');
		Route::post('/submit-transaction', 'TransactionController@submitTransaction')->name('submit-new-transaction');

		// PDF View on Transaction
		Route::get('/transaction-report', 'TransactionController@TransactionReportPDF')->name('transaction-report');
		

		// SHIPMENT CONTROLLER
		// GET
		Route::get('/shipments', 'ShipmentController@shipments')->name('list-of-shipments');
		Route::get('/shipment-form', 'ShipmentController@shipmentForm')->name('display-shipment-form');
		Route::get('/view-shipment/{id}', 'ShipmentController@viewShipment')->name('view-shipment');
		Route::get('/ship-done/{id}', 'ShipmentController@shipDone')->name('shipment-done');

		// POST
		Route::post('/create-shipment', 'ShipmentController@createShipment')->name('create-new-shipment');

		// CHEQUE CONTROLLER
		// GET
		Route::get('/cheque-transaction', 'ChequeController@issueTransaction')->name('cheque-transaction');
		Route::get('/cheque-list/{id}', 'ChequeController@chequeList')->name('cheque-list');
		Route::get('/issue-cheque/{id}', 'ChequeController@issueCheque')->name('issue-cheque');
		Route::get('/issue-voucher/{id}', 'ChequeController@issueVoucher')->name('issue-voucher');

		// POST
		Route::post('/save-cheque', 'ChequeController@saveCheque')->name('save-new-cheque');

		// AGENT CONTROLLER
		// GET
		Route::get('/agents', 'AgentController@agents')->name('display-agents');
		Route::get('/new-agent', 'AgentController@agentForm')->name('agent-form');

		// POST
		Route::post('/submit-agent', 'AgentController@submitAgent')->name('submit-agent');

		// STATION CONTROLLER
		// GET
		Route::get('/stations', 'StationController@stations')->name('display-stations');
		Route::get('/new-station', 'StationController@stationForm')->name('display-station-form');
		Route::get('/delete-station/{id}', 'StationController@deleteStation')->name('delete-station');

		// POST
		Route::post('/submit-station', 'StationController@submitStation')->name('submit-new-station');

		// BANK CONTROLLER
		// GET
		Route::get('/banks', 'BankController@banks')->name('display-all-banks');
		Route::get('/new-bank', 'BankController@bankForm')->name('display-bank-form');
		Route::get('/delete-bank/{id}', 'BankController@deleteBank')->name('delete-bank');
		Route::get('/edit-bank/{id}', 'BankController@editBank')->name('edit-bank');
		Route::get('/update-bank/{id}', 'BankController@updateBank')->name('update-bank');
		Route::get('account-number/{id}', 'BankController@accountNumber')->name('get-account-number');

		// POST
		Route::post('/submit-bank', 'BankController@submitBank')->name('submit-new-bank');

		// USER CONTROLLER
		// GET
		Route::get('/users', 'UserController@users')->name('user-management');
		Route::get('/delete-user/{id}', 'UserController@deleteUser')->name('delete-user');
		Route::get('/add-user', 'UserController@addUserForm')->name('add-user-form');

		// POST
		Route::post('/create-user', 'UserController@createUser')->name('create-user');

		// REPORT CONTROLLER
		// GET
		Route::get('/account-report', 'ReportController@accountReport')->name('account-report');
		Route::get('/payee-report', 'ReportController@payeeReport')->name('payee-report');

		// POST
		Route::post('/generate-report', 'ReportController@generateAccountPDF')->name('account-report-pdf');
		Route::post('/payee-report', 'ReportController@payeeReportPDF')->name('payee-report-pdf');
	});
});

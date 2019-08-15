<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


// Models
use App\Models\Logs;

class LogsListener
{
    private $transaction;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }

    /**
     * Handle saving transaction logs event
     * 
     * @param $event array
     * @return void
     */
    public function handleSavingTransactionsLog($event)
    {
        Logs::create($event->arrData);
    }
}

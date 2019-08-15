<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    protected $table = "cheque";

    protected $fillable = ['transaction_id', 'agent_id', 'bank_id', 'cheque_no', 'amount', 'amount_words'];

    public $timestamp = true;

    // ELOQUENT RELATIONSHIP
    protected function transaction() {
        return $this->belongsTo('App\Models\Transactions', 'transaction_id');
    }

    protected function bank() {
        return $this->belongsTo('App\Models\Banks', 'bank_id');
    }

    protected function agent() {
        return $this->belongsTo('App\Models\Agents', 'agent_id');
    }
}
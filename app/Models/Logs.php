<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'transac_logs';

    protected $fillable = ['user_id', 'transaction_id', 'ip_address'];

    public $timestamp = true;

    // ELOQUENT RELATIONSHIP
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function transaction() {
        return $this->belongsTo('App\Models\Transactions', 'transaction_id');
    }
}
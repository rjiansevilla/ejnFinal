<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['user_id', 
                            'agent_id', 
                            'station_id', 
                            'product_id', 
                            'quality', 
                            'sacks',
                            'gross_weight', 
                            'net_weight', 
                            'moisture', 
                            'ntc',  
                            'others',
                            'unit_price', 
                            'total_price', 
                            'amount',
                            'transaction_no',
                            'is_issue',
                            'is_voucher'
                        ];

    public $timestamp = true;

    // ELOQUENT RELATIONSHIP
    public function agent() {
        return $this->belongsTo('App\Models\Agents', 'agent_id');
    }

    public function station() {
        return $this->belongsTo('App\Models\Stations', 'station_id');
    }

    public function product() {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }

    public function log() {
        return $this->hasMany('App\Models\Logs', 'transaction_id');
    }

    public function cheque() {
        return $this->hasMany('App\Models\Cheque', 'transaction_id');
    }
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipments extends Model
{
    protected $table = 'shipment';

    protected $fillable = [
                            'user_id',
                            'van_no',
                            'bl_no',
                            'ship_from',
                            'ship_to',
                            'price',
                            'ship_date',
                            'bales',
                            'kls',
                            'others',
                            'shipment_no',
                            'is_ship',
                            'status',
                        ];
    
    public $timestamp = true;

    // ELOQUENT RELATIONSHIP
    protected function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}